<?php
/**
 * Description of OrdersSettingsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\UserGroups;

use Dots\Data\DTO;

class UserGroupOrdersSettingsDTO extends DTO
{
    protected bool $ordersCashbackAvailable = false;

    protected float $cashBackPercentDelivery = 0;

    protected float $cashBackPercentPickup = 0;

    protected float $cashBackPercentBooking = 0;

    protected float $cashBackPercentDeliveryInner = 0;

    protected float $cashBackPercentDeliveryInnerToDoor = 0;

    public function isOrdersCashbackAvailable(): bool
    {
        return $this->ordersCashbackAvailable;
    }

    public function getCashBackPercentDelivery(): float
    {
        return $this->cashBackPercentDelivery;
    }

    public function getCashBackPercentPickup(): float
    {
        return $this->cashBackPercentPickup;
    }

    public function getCashBackPercentBooking(): float
    {
        return $this->cashBackPercentBooking;
    }

    public function getCashBackPercentDeliveryInner(): float
    {
        return $this->cashBackPercentDeliveryInner;
    }

    public function getCashBackPercentDeliveryInnerToDoor(): float
    {
        return $this->cashBackPercentDeliveryInnerToDoor;
    }
}
