<?php
/**
 * Description of UserGroupOrdersSettingsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\UserGroups;

use Dots\Data\DTO;
use Dotsplatform\CashbackApi\DTO\OrdersCashbackReceivingType;

class UserGroupOrdersSettingsDTO extends DTO
{
    protected bool $ordersCashbackAvailable = false;

    protected string $ordersCashbackReceivingType = OrdersCashbackReceivingType::DELIVERY_TYPE->value;

    protected float $cashBackPercentDelivery = 0;

    protected float $cashBackPercentPickup = 0;

    protected float $cashBackPercentBooking = 0;

    protected float $cashBackPercentDeliveryInner = 0;

    protected float $cashBackPercentDeliveryInnerToDoor = 0;

    protected float $cashBackPercentIOS = 0;

    protected float $cashBackPercentAndroid = 0;

    protected float $cashBackPercentWeb = 0;

    protected float $cashBackPercentByCompany = 0;

    protected float $cashBackPercentOther = 0;

    protected float $cashBackPercentOnline = 0;

    protected float $cashBackPercentCash = 0;

    protected float $cashBackPercentTerminal = 0;

    public function isOrdersCashbackAvailable(): bool
    {
        return $this->ordersCashbackAvailable;
    }

    public function getOrdersCashbackReceivingType(): string
    {
        return $this->ordersCashbackReceivingType;
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

    public function getCashBackPercentIOS(): float
    {
        return $this->cashBackPercentIOS;
    }

    public function getCashBackPercentAndroid(): float
    {
        return $this->cashBackPercentAndroid;
    }

    public function getCashBackPercentWeb(): float
    {
        return $this->cashBackPercentWeb;
    }

    public function getCashBackPercentByCompany(): float
    {
        return $this->cashBackPercentByCompany;
    }

    public function getCashBackPercentOther(): float
    {
        return $this->cashBackPercentOther;
    }

    public function getCashBackPercentOnline(): float
    {
        return $this->cashBackPercentOnline;
    }

    public function getCashBackPercentCash(): float
    {
        return $this->cashBackPercentCash;
    }

    public function getCashBackPercentTerminal(): float
    {
        return $this->cashBackPercentTerminal;
    }
}
