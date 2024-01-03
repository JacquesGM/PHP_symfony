<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TesteController  extends AbstractController
{
    public function listar(): Response
    {
        $usuario = 'Maria';
        $produtos = [
            'Sabao',
            'Arroz',
            'Cheiro Verde'
        ];

        return $this -> render('teste/listar.html.twig');
    }

    public function cadastrar(): Response
    {
        return $this -> render('teste/cadastrar.html.twig');
    }
}

