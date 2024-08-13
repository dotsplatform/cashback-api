<?php
/**
 * Description of OrdersSettingsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO;

class OrdersSettingsDTO
{
    protected function __construct(
        private float $ordersCashbackLimit,
        private float $cashBackPercentDelivery,
        private float $cashBackPercentPickup,
        private float $cashBackPercentBooking,
        private float $cashBackPercentDeliveryInner,
        private float $cashBackPercentDeliveryInnerToDoor,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['ordersCashbackLimit'] ?? 0,
            $data['cashBackPercentDelivery'] ?? 0,
            $data['cashBackPercentPickup'] ?? 0,
            $data['cashBackPercentBooking'] ?? 0,
            $data['cashBackPercentDeliveryInner'] ?? 0,
            $data['cashBackPercentDeliveryInnerToDoor'] ?? 0,
        );
    }

    public function toArray(): array
    {
        return [
            'ordersCashbackLimit' => $this->getOrdersCashbackLimit(),
            'cashBackPercentDelivery' => $this->getCashBackPercentDelivery(),
            'cashBackPercentPickup' => $this->getCashBackPercentPickup(),
            'cashBackPercentBooking' => $this->getCashBackPercentBooking(),
            'cashBackPercentDeliveryInner' => $this->getCashBackPercentDeliveryInner(),
            'cashBackPercentDeliveryInnerToDoor' => $this->getCashBackPercentDeliveryInnerToDoor(),
        ];
    }

    public function getOrdersCashbackLimit(): float
    {
        return $this->ordersCashbackLimit;
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