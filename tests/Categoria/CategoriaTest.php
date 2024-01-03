<?php

declare(strict_types=1);

namespace App\Tests\Categoria;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoriaTest extends WebTestCase
{
    public function testBuscarCategoria(): void
    {
        $dados = [1,3,5];

        $this -> assertEquals(10,10);
        $this -> assertIsString('Jacques');
        $this -> assertIsArray($dados);

        $this -> assertEquals(count($dados), 3);
    }

    public function testPaginaProdutos(): void 
    {
        $navegador = static::createClient() -> request('GET', '/produtos');
        
        $this -> assertResponseIsSuccessful();

        $this -> assertSelectorTextContains('h1', 'Listar Produtos');

        $this -> assertSelectorTextContains('th', 'Nome');

    }

    public function testEndpointBuscarCategorias(): void 
    {
        $client = static::createClient();

        $client -> request('GET', '/api/clientes/49');

        $response = json_decode(
            $client -> getResponse() -> getContent()
        );

        $this -> assertResponseIsSuccessful();
        $this -> assertResponseStatusCodeSame(200);
        $this -> assertIsArray($response);
        $this -> assertIsObject($response[0]);
        $this -> assertEquals(true, isset($response[0] -> id));
        $this -> assertIsInt($response[0] -> id);
        $this -> assertEquals(true, isset($response[0] -> nome));
        $this -> assertIsString($response[0] -> nome);
    }
}