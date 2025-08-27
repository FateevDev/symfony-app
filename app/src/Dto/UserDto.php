<?php

declare(strict_types=1);

namespace App\Dto;

use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

final readonly class UserDto
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Email(mode: 'strict')]
        #[SerializedName('email')]
        public string $email,
        #[Assert\NotBlank]
        #[SerializedName('password')]
        public string $password,
    ) {
    }
}
