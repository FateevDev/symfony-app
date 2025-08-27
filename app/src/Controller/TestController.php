<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/test')]
class TestController
{
    #[Route('/')]
    public function index(): Response
    {
        return new Response('Hello World!');
    }
}
