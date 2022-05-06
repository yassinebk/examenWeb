<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Prophecy\Comparator\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker =
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
