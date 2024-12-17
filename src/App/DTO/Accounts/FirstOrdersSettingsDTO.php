<?php
/**
 * Description of FirstOrdersSettingsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Accounts;

use Dots\Data\DTO;
use Dotsplatform\CashbackApi\DTO\CashbackType;

class FirstOrdersSettingsDTO extends DTO
{
    protected bool $firstOrdersCashbackAvailable = false;

    protected int $firstOrdersCountLimit = 0;

    protected string $firstOrdersCashbackType = CashbackType::PERCENT->value;

    protected float $firstOrdersCashbackAmount = 0;

    public function isFirstOrdersCashbackAvailable(): bool
    {
        return $this->firstOrdersCashbackAvailable;
    }

    public function getFirstOrdersCountLimit(): int
    {
        return $this->firstOrdersCountLimit;
    }

    public function getFirstOrdersCashbackType(): string
    {
        return $this->firstOrdersCashbackType;
    }

    public function getFirstOrdersCashbackAmount(): float
    {
        return $this->firstOrdersCashbackAmount;
    }
}