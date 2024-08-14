<?php
/**
 * Description of CashbackType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO;

enum CashbackType: string
{
    case AMOUNT = 'amount';
    case PERCENT = 'percent';

    public static function values(): array
    {
        return array_map(fn (self $type): string => $type->value, self::cases());
    }

    public function isPercent(): bool
    {
        return $this->is(self::PERCENT);
    }

    public function isAmount(): bool
    {
        return $this->is(self::AMOUNT);
    }

    public function is(self $type): bool
    {
        return $this === $type;
    }
}