<?php

namespace App\DataFixtures;

use App\Entity\Categoria;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriaFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $categoria = new Categoria();
            $categoria -> setNome('Categoria' .$i);

            $manager -> persist($categoria);
        }

        $manager->flush();
    }
}
