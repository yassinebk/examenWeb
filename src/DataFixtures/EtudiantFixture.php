<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EtudiantFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $sectionEnts=[];
        $sections=["GL","RT","IMI","IIA","BIO","CH"];
        for($i=0;$i<count($sections);$i++)

        {
            $sectionO = new Section();
            $sectionO->setDesignation($sections[$i]);
            $sectionEnts[]=$sectionO;
            $manager->persist($sectionO);
        }

        for ($i = 0; $i < 100; $i++) {
            $sectionNumber = rand(0, count($sections) - 1);
            $etudiant = new Etudiant();
            $etudiant->setNom($faker->lastName);
            $etudiant->setPrenom($faker->lastName);
            if ($i % 5 !== 0)
                $etudiant->setSection($sectionEnts[$sectionNumber]);
         $manager->persist($etudiant);
        }

        $manager->flush();
    }
}
