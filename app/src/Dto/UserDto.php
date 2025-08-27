<?php

declare(strict_types=1);

namespace App\Dto;

use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

final readonly class UserDto
{
    public function __construct(
        #[Assert\NotBlank]
        #[SerializedName('first_name')]
        public string $firstName,
        #[Assert\NotBlank]
        #[SerializedName('last_name')]
        public string $lastName,
    ) {
    }
}
