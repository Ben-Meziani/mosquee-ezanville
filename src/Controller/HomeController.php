<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Entity\Historic;
use App\Entity\MosqueeImage;
use App\Form\ContactType;
use App\Repository\HistoricRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class HomeController extends AbstractController
{
    // #[Route('/', name: 'home')]
    // public function index(): Response
    // {
    //     return $this->render('home/index.html.twig', [
    //         'controller_name' => 'HomeController',
    //     ]);
    // }

    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, MailerInterface $mailer, Environment $twig, LoggerInterface $logger): Response
    {

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

                $mail = new PHPMailer(true);

                try {
                    $data = $form->getData();

                    // Vérification de l'existence du fichier template
                    $templateEmail = $twig->render('emails/emails.html.twig', [
                        'nom' => $data['nom'],
                        'prenom' => $data['prenom'],
                        'telephone' => $data['telephone'],
                        'message' => $data['message'],
                    ]);

                    // Configuration SMTP
                    $mail->isSMTP();
                    $mail->Host = $_ENV['MAIL_HOST']; // Serveur Mailtrap
                    $mail->SMTPAuth = true;
                    $mail->Username = $_ENV['MAIL_USERNAME']; // Username
                    $mail->Password = $_ENV['MAIL_PASSWORD']; // Password
                    switch($_ENV['MAIL_PORT']){
                        case 587:
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                            break;
                        case 465:
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                            break;
                        default:
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    }
                    $mail->Port = $_ENV['MAIL_PORT'];

                    // Expéditeur et destinataire
                    $mail->setFrom($data['email'], $_ENV['MAIL_FROM_NAME']);
                    $mail->addAddress($_ENV['MAIL_TO_ADDRESS']);

                    // Contenu du mail
                    $mail->Subject = $data['objet'];
                    $mail->isHTML(true);
                    $mail->Body = $templateEmail;
                    //Encodage
                    $mail->CharSet = 'UTF-8';
                    // Envoi du mail
                    $mail->send();
                    return new JsonResponse(['success' => 'Votre message a bien été envoyé'], 200);
                } catch (Exception $e) {
                    $logger->error('Erreur lors de l\'envoi du message : ' . $e->getMessage());
                    return new JsonResponse(['error' => $e->getMessage()], 500);
                }

        }

        return $this->render('home/contact.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView()
        ]);
    }

    #[Route('/priere', name: 'prayer')]
    public function prayer(): Response
    {
        return $this->render('home/prayer.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/activites', name: 'activities')]
    public function activities(): Response
    {
        return $this->render('home/activities.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/association', name: 'mosquee')]
    public function mosquee(EntityManagerInterface $em): Response
    {
        $arrayHistory = $em->getRepository(Historic::class)->findAllHistoric();
        $images = $em->getRepository(MosqueeImage::class)->findAll();
        $images = count($images) > 0 ? array_chunk($images, ceil(count($images) / 2)) : [];
        $firstPartImages = !empty($images[0]) ? $images[0] : [];
        $secondPartImages = !empty($images[1]) ? $images[1] : [];
        return $this->render('home/mosquee.html.twig', [
            'history' => $arrayHistory,
            'firstPartImages' => $firstPartImages,
            'secondPartImages' => $secondPartImages
        ]);
    }
    
    #[Route('/', name: 'home')]
    public function actualities(EntityManagerInterface $em): Response
    {
        $actualities = $em->getRepository(Actuality::class)->findAll();
        return $this->render('home/actualities.html.twig', [
            'actualities' => $actualities
        ]);
    }

    #[Route('/donation', name: 'donation')]
    public function donation(): Response
    {
        return $this->render('home/donation.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/informations', name: 'informations')]
    public function informations(): Response
    {
        return $this->render('home/informations.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/don-campaign', name: 'don-campaign')]
    public function don(): Response
    {
        return $this->render('home/don-campaign.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/mentions-legales', name: 'mentions-legales')]
    public function mentions(): Response
    {
        return $this->render('home/mentions-legales.html.twig');
    }

}
