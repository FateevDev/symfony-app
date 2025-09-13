<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Dto\UserDto;
use App\Entity\User;
use App\Exceptions\UserAlreadyExistsException;
use App\Repository\UserRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Throwable;

#[Route('/register', methods: ['POST'], format: 'json')]
final class RegisterController extends AbstractController
{
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly UserRepository $userRepository,
        private readonly UserPasswordHasherInterface $passwordHasher,
    ) {
    }

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

        try {
            $this->userRepository->save($user);
        } catch (Throwable $e) {
            throw new UserAlreadyExistsException();
        }

        return new JsonResponse('ok');
    }
}
