<?php

declare(strict_types=1);

namespace App\Controller;

use App\Dto\UserDto;
use App\Entity\User;
use App\Repository\UserRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/test', methods: ['POST'], format: 'json')]
class TestController extends AbstractController
{
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly UserRepository $userRepository,
    ) {
    }

    #[Route('/')]
    public function __invoke(
        #[MapRequestPayload(
            acceptFormat: 'json',
        )] UserDto $userDto,
    ): JsonResponse {
        $this->logger->info('Hello World!');

        $user = new User();

        return new JsonResponse($userDto->firstName . ' ' . $userDto->lastName);
    }
}
