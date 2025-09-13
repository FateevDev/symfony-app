<?php

declare(strict_types=1);

namespace MyApp\Order\Domain\Entity;

enum OrderType: string
{
    case BUY = 'buy';
    case SELL = 'sell';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
