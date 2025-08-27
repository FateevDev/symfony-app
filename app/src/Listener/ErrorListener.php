<?php

declare(strict_types=1);

namespace App\Listener;

use App\Exceptions\UserAlreadyExistsException;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

#[AsEventListener('kernel.exception')]
final readonly class ErrorListener
{
    public function __invoke(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if ($exception instanceof UserAlreadyExistsException) {
            $event->setResponse(new JsonResponse($exception->getMessage(), Response::HTTP_CONFLICT));
        }
    }
}
