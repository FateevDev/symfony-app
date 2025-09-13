<?php

declare(strict_types=1);

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route('order', methods: ['POST'])]
final class OrderController extends AbstractController
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }
}