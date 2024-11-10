<?php

namespace App\DataFixtures;

use App\Entity\Historic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $arrayHistory = [
            "1987" => "Création de l'Association socio-culturelle de la communauté islamique des Yvelines, qui permet aux musulmans de se retrouver pour pratiquer leur culte dans un mise à disposition par un fidèle au 11 rue Philippe de Dangeau à Ezanville",
            "1997" => "Modification de l'appellation de l'association pour devenir l'Association des Musulmans de Ezanville (AMV).",
            "1999" => "Achat d'un terrain de 1 000 m² au 11 rue Philippe de Dangeau à Ezanville pour la construction d'une mosquée.",
            "2011" => "Adoption des statuts d'association cultuelle pour l'AMV, en vue d'une transformation de l'association suivi du projet de rénovation et de restructuration des lieux.",
            "2013" => "Début des travaux de rénovation et de restructuration de la mosquée.",
            "2014" => "Inauguration de la mosquée le 14 juin 2014.",
            "2015" => "Création de l'Association des Musulmans de Ezanville (AMV) pour la gestion de la mosquée de Ezanville.",
            "2016" => "Création de l'Association des Musulmans de Domont (AMD) pour la gestion de la mosquée de Domont.",
            "2017" => "Création de l'Association des Musulmans de Bouffémont (AMB) pour la gestion de la mosquée de Bouffémont.",
            "2018" => "Création de l'Association des Musulmans de Montmagny (AMM) pour la gestion de la mosquée de Montmagny.",
            "2019" => "Création de l'Association des Musulmans de Montmorency (AMM) pour la gestion de la mosquée de Montmorency.",
            "2020" => "Création de l'Association des Musulmans de Saint-Brice-sous-Forêt (AMSBF) pour la gestion de la mosquée de Saint-Brice-sous-Forêt.",
            "2021" => "Création de l'Association des Musulmans de Saint-Prix (AMSP) pour la gestion de la mosquée de Saint-Prix.",
            "2022" => "Création de l'Association des Musulmans de Saint-Leu-la-Forêt (AMSLF) pour la gestion de la mosquée de Saint-Leu-la-Forêt.",
            "2023" => "Création de l'Association des Musulmans de Montlignon (AMM) pour la gestion de la mosquée de Montlignon."
            
        ];
        foreach ($arrayHistory as $key => $value) {
            $historic = new Historic();
            $historic->setDate($key);
            $historic->setText($value);
            $manager->persist($historic);
        }
        $manager->flush();
    }
}
