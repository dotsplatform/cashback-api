<?php
/**
 * Description of TransactionSources.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\Transactions\Consts;

enum TransactionSource: int
{
    case SOURCE_DOTS = 10;

    case SOURCE_POSTER = 20;

    case SOURCE_SYRVE = 30;

    public function isSourceDots(): bool
    {
        return $this === self::SOURCE_DOTS;
    }

    public function isSourcePoster(): bool
    {
        return $this === self::SOURCE_POSTER;
    }

    public function isSourceSyrve(): bool
    {
        return $this === self::SOURCE_SYRVE;
    }
}
