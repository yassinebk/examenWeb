<?php

namespace App\DataFixtures;

use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SectionFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $sections=["GL","RT","IMI","IIA","BIO","CH"];
        for($i=0;$i<count($sections);$i++)

        {
            $sectionO = new Section();
            $sectionO->setDesignation($sections[i]);
            $manager->persist($sectionO);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
