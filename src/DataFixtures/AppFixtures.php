<?php

namespace App\DataFixtures;
use App\Factory\EnseignantFactory;
use App\Factory\EtudiantFactory;
use App\Factory\SoutenanceFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        //$manager->flush();


        EnseignantFactory::createMany(10);
        EtudiantFactory::createMany(20);
        SoutenanceFactory::createMany(15);
    }
}
