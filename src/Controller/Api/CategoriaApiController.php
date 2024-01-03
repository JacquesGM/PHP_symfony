<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Repository\CategoriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class CategoriaApiController extends AbstractController
{
    public function __construct(
        private CategoriaRepository $repository,
        private SerializerInterface $serializer
    ){
    }
    
    public function getList(): Response
    {
        $categorias = $this -> repository -> findAll();

        $json = $this -> serializer -> serialize($categorias, 'json');

        return new Response($json);
    }
}

