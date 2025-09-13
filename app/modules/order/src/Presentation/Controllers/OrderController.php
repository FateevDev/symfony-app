<?php

declare(strict_types=1);

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', methods: ['POST'])]
final class OrderController extends AbstractController
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse('ok');
    }
}
