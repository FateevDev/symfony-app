<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;

use function phpinfo;

#[Route('/debug', methods: ['GET'], format: 'html')]
final readonly class DebugController
{
    public function __invoke()
    {
        phpinfo();
    }
}
