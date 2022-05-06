<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Repository\SectionRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EtudiantFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $sectionRepos = $manager->getRepository(SectionRepository::class);
        $sections = $sectionRepos->findAll();


        for ($i = 0; $i < 100; $i++) {
            $sectionNumber = rand(0, count($sections) - 1);
            $etudiant = new Etudiant();
            $etudiant->setNom($faker->lastName);
            $etudiant->setPrenom($faker->lastName);
            if ($i % 5 !== 0)
                $etudiant->setSection($sections[$sectionNumber]);
         $manager->persist($etudiant);
        }

        $manager->flush();
    }
}
