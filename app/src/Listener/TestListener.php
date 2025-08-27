<?php

declare(strict_types=1);

namespace App\Listener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

#[AsEventListener('kernel.request')]
final readonly class TestListener
{
    public function __invoke(RequestEvent $event): void
    {
        $request = $event->getRequest();
        $content = $request->getContent();


//        $event->setResponse(new Response('error', 400));
    }
}
