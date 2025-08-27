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
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/test', methods: ['POST'], format: 'json')]
final class RegisterController extends AbstractController
{
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly UserRepository $userRepository,
        private readonly UserPasswordHasherInterface $passwordHasher,
    ) {
    }

    #[Route('/')]
    public function __invoke(
        #[MapRequestPayload(
            acceptFormat: 'json',
        )] UserDto $userDto,
    ): JsonResponse {
        $user = new User($userDto->email);

        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $userDto->password
        );

        $user->setPassword($hashedPassword);
        $user->setRoles(['ROLE_USER']);

        $this->userRepository->save($user);

        return new JsonResponse('ok');
    }
}
