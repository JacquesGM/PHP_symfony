<?php

namespace App\DataFixtures;

use App\Entity\Categoria;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categoria = new Categoria();
        $categoria -> setNome('Categoria Teste');

        $manager -> persist($categoria);

        for ($i = 1; $i <= 10; $i++) {
            $product = new Product();
            $product -> setName('Produto Teste'.$i);
            $product -> setPrice(199.96 + $i);
            $product -> setDescription('Descrição teste',$i);
            $product -> setCategoria($categoria);

            $manager -> persist($product);
        }
        
        

        $manager->flush();
    }
}
