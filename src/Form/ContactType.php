<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Contact;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'required' => true,
                'attr' => ['class' => 'rl-form-input w-input']
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'required' => true,
                'attr' => ['class' => 'rl-form-input w-input']
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => true,
                'attr' => ['class' => 'rl-form-input w-input']
            ])
            ->add('telephone', TelType::class, [
                'label' => 'Numéro de téléphone',
                'required' => true,
                'attr' => ['class' => 'rl-form-input w-input', 'placeholder' => '(facultatif)']
            ])
            ->add('objet', ChoiceType::class, [
                'label' => 'Sélectionnez l\'objet de votre message',
                'choices' => [
                    'Sélection...' => '',
                    'Question d\'ordre général' => 'Question d\'ordre général',
                    'Devenir bénévole' => 'Devenir bénévole',
                    'Autre' => 'Autre'
                ],
                'required' => true,
                'attr' => ['class' => 'rl-form-select-input w-select']
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'required' => true,
                'attr' => ['class' => 'rl-form-text-area w-input', 'placeholder' => 'Entrez votre message...']
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => ['class' => 'rl-button-2 f-banner-button w-button']
            ]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
