<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Services\UserHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('test', methods: ['GET'])]
final class TestApiController extends AbstractController
{
    public function __construct(private readonly UserHandler $userHandler)
    {
    }

//    #[IsGranted('ROLE_ADMIN')]
    #[IsGranted('ROLE_USER')]
    public function __invoke(): JsonResponse
    {
        $user = $this->getUser();

        $this->userHandler->handle();

        return new JsonResponse(['user' => $user?->getUserIdentifier()]);
    }
}
