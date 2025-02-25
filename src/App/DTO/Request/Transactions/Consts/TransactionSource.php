<?php
/**
 * Description of TransactionSources.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\Transactions\Consts;

enum TransactionSource: int
{
    case DOTS = 10;

    case POSTER = 20;

    case SYRVE = 30;

    public function isDots(): bool
    {
        return $this === self::DOTS;
    }

    public function isPoster(): bool
    {
        return $this === self::POSTER;
    }

    public function isSyrve(): bool
    {
        return $this === self::SYRVE;
    }

    public static function values(): array
    {
        return array_map(fn ($value) => $value->value, self::cases());
    }
}
