<?php

declare(strict_types=1);

namespace MyApp\Order\Presentation\Dto;

use MyApp\Order\Domain\Entity\OrderType;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

final readonly class OrderCreateDto
{
    public function __construct(
        #[SerializedName('type')]
        #[Assert\NotBlank]
        #[Assert\Choice(callback: [OrderType::class, 'values'])]
        public string $orderType,
    )
    {
    }
}
