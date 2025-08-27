<?php

declare(strict_types=1);

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('test', methods: ['GET'], format: 'json')]
final class TestApiController extends AbstractController
{
    public function __invoke(): JsonResponse
    {
        $user = $this->getUser();

        return new JsonResponse(['user' => $user?->getUserIdentifier()]);
    }
}
