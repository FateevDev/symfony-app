<?php

declare(strict_types=1);

namespace MyApp\Order\Presentation\Controllers;

use MyApp\Order\Application\Services\OrderHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/create', name: 'create', methods: ['POST'])]
final class OrderCreate extends AbstractController
{
    public function __construct(private readonly OrderHandler $orderHandler)
    {
    }

    public function __invoke(): JsonResponse
    {
        $this->orderHandler->handle();

        return new JsonResponse('ok');
    }
}
