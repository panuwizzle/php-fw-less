<?php
declare(strict_types=1);

namespace ExampleApp;

use Psr\Http\Message\ResponseInterface;


class HelloWorld
{
    private $foo;
    private $response;

    public function __construct(string $foo, ResponseInterface $response)
    {
        $this->foo = $foo;
        $this->response = $response;
    }

    public function __invoke(): ResponseInterface
    {
        $response = $this->response->withHeader('Content-Type', 'text/html');
        $response->getBody()
                 ->write("<h1>{$this->foo}</h1>");
        return $response;
    }

    public function announce(): void
    {
        echo 'Hello, autoload world!';
    }
}
