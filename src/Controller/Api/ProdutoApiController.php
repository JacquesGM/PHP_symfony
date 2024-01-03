<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Entity\Product;
use App\Repository\CategoriaRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class ProdutoApiController extends AbstractController
{
    public function __construct(
        private ProductRepository $repository,
        private SerializerInterface $serializer,
        private CategoriaRepository $categoriaRepository
    ){
    }
    
    public function getList(): Response
    {
        $produtos = $this -> repository -> findAll();

        $json = $this -> serializer -> serialize($produtos, 'json');

        return new Response($json);
    }

    public function create(Request $request): Response
    {

        //Transformando o json recebido na requisição em uma instancia de Produto
        $produto = $this -> serializer -> deserialize(
            $request -> getContent(),
            Product::class,
            'json'
        );

        $body = json_decode($request -> getContent());

        //buscando a categoria do id recebido no request
        $categoria = $this -> categoriaRepository -> find(
            $body -> categoria
        );

        //sentando a categoria encontrado no produto
        $produto -> setCategoria($categoria);

        $this -> repository -> save($produto, true);

        return new Response(
            $this -> serializer -> serialize($produto, 'json')
        );
    }
}

