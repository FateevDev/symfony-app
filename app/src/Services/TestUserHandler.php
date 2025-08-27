<?php

declare(strict_types=1);

namespace App\Services;

use Psr\Log\LoggerInterface;

final readonly class TestUserHandler implements UserHandler
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function handle(): void
    {
        $this->logger->info('Test user handler');
    }
}
