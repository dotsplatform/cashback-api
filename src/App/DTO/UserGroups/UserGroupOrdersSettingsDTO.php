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

    protected float $cashBackPercentByOperator = 0;

    protected float $cashBackPercentOther = 0;

    protected float $cashBackPercentOnline = 0;

    protected float $cashBackPercentCash = 0;

    protected float $cashBackPercentTerminal = 0;

    protected float $cashBackPercentDeliveryIOS = 0;

    protected float $cashBackPercentDeliveryAndroid = 0;

    protected float $cashBackPercentDeliveryWeb = 0;

    protected float $cashBackPercentDeliveryByCompany = 0;

    protected float $cashBackPercentDeliveryByOperator = 0;

    protected float $cashBackPercentDeliveryOther = 0;

    protected float $cashBackPercentPickupIOS = 0;

    protected float $cashBackPercentPickupAndroid = 0;

    protected float $cashBackPercentPickupWeb = 0;

    protected float $cashBackPercentPickupByCompany = 0;

    protected float $cashBackPercentPickupByOperator = 0;

    protected float $cashBackPercentPickupOther = 0;

    protected float $cashBackPercentBookingIOS = 0;

    protected float $cashBackPercentBookingAndroid = 0;

    protected float $cashBackPercentBookingWeb = 0;

    protected float $cashBackPercentBookingByCompany = 0;

    protected float $cashBackPercentBookingByOperator = 0;

    protected float $cashBackPercentBookingOther = 0;

    protected float $cashBackPercentDeliveryInnerIOS = 0;

    protected float $cashBackPercentDeliveryInnerAndroid = 0;

    protected float $cashBackPercentDeliveryInnerWeb = 0;

    protected float $cashBackPercentDeliveryInnerByCompany = 0;

    protected float $cashBackPercentDeliveryInnerByOperator = 0;

    protected float $cashBackPercentDeliveryInnerOther = 0;

    protected float $cashBackPercentDeliveryInnerToDoorIOS = 0;

    protected float $cashBackPercentDeliveryInnerToDoorAndroid = 0;

    protected float $cashBackPercentDeliveryInnerToDoorWeb = 0;

    protected float $cashBackPercentDeliveryInnerToDoorByCompany = 0;

    protected float $cashBackPercentDeliveryInnerToDoorByOperator = 0;

    protected float $cashBackPercentDeliveryInnerToDoorOther = 0;

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

    public function getCashBackPercentByOperator(): float
    {
        return $this->cashBackPercentByOperator;
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

    public function getCashBackPercentDeliveryIOS(): float
    {
        return $this->cashBackPercentDeliveryIOS;
    }

    public function getCashBackPercentDeliveryAndroid(): float
    {
        return $this->cashBackPercentDeliveryAndroid;
    }

    public function getCashBackPercentDeliveryWeb(): float
    {
        return $this->cashBackPercentDeliveryWeb;
    }

    public function getCashBackPercentDeliveryByCompany(): float
    {
        return $this->cashBackPercentDeliveryByCompany;
    }

    public function getCashBackPercentDeliveryByOperator(): float
    {
        return $this->cashBackPercentDeliveryByOperator;
    }

    public function getCashBackPercentDeliveryOther(): float
    {
        return $this->cashBackPercentDeliveryOther;
    }

    public function getCashBackPercentPickupIOS(): float
    {
        return $this->cashBackPercentPickupIOS;
    }

    public function getCashBackPercentPickupAndroid(): float
    {
        return $this->cashBackPercentPickupAndroid;
    }

    public function getCashBackPercentPickupWeb(): float
    {
        return $this->cashBackPercentPickupWeb;
    }

    public function getCashBackPercentPickupByCompany(): float
    {
        return $this->cashBackPercentPickupByCompany;
    }

    public function getCashBackPercentPickupByOperator(): float
    {
        return $this->cashBackPercentPickupByOperator;
    }

    public function getCashBackPercentPickupOther(): float
    {
        return $this->cashBackPercentPickupOther;
    }

    public function getCashBackPercentBookingIOS(): float
    {
        return $this->cashBackPercentBookingIOS;
    }

    public function getCashBackPercentBookingAndroid(): float
    {
        return $this->cashBackPercentBookingAndroid;
    }

    public function getCashBackPercentBookingWeb(): float
    {
        return $this->cashBackPercentBookingWeb;
    }

    public function getCashBackPercentBookingByCompany(): float
    {
        return $this->cashBackPercentBookingByCompany;
    }

    public function getCashBackPercentBookingByOperator(): float
    {
        return $this->cashBackPercentBookingByOperator;
    }

    public function getCashBackPercentBookingOther(): float
    {
        return $this->cashBackPercentBookingOther;
    }

    public function getCashBackPercentDeliveryInnerIOS(): float
    {
        return $this->cashBackPercentDeliveryInnerIOS;
    }

    public function getCashBackPercentDeliveryInnerAndroid(): float
    {
        return $this->cashBackPercentDeliveryInnerAndroid;
    }

    public function getCashBackPercentDeliveryInnerWeb(): float
    {
        return $this->cashBackPercentDeliveryInnerWeb;
    }

    public function getCashBackPercentDeliveryInnerByCompany(): float
    {
        return $this->cashBackPercentDeliveryInnerByCompany;
    }

    public function getCashBackPercentDeliveryInnerByOperator(): float
    {
        return $this->cashBackPercentDeliveryInnerByOperator;
    }

    public function getCashBackPercentDeliveryInnerOther(): float
    {
        return $this->cashBackPercentDeliveryInnerOther;
    }

    public function getCashBackPercentDeliveryInnerToDoorIOS(): float
    {
        return $this->cashBackPercentDeliveryInnerToDoorIOS;
    }

    public function getCashBackPercentDeliveryInnerToDoorAndroid(): float
    {
        return $this->cashBackPercentDeliveryInnerToDoorAndroid;
    }

    public function getCashBackPercentDeliveryInnerToDoorWeb(): float
    {
        return $this->cashBackPercentDeliveryInnerToDoorWeb;
    }

    public function getCashBackPercentDeliveryInnerToDoorByCompany(): float
    {
        return $this->cashBackPercentDeliveryInnerToDoorByCompany;
    }

    public function getCashBackPercentDeliveryInnerToDoorByOperator(): float
    {
        return $this->cashBackPercentDeliveryInnerToDoorByOperator;
    }

    public function getCashBackPercentDeliveryInnerToDoorOther(): float
    {
        return $this->cashBackPercentDeliveryInnerToDoorOther;
    }
}
