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
        private float $cashBackPercentDelivery,
        private float $cashBackPercentPickup,
        private float $cashBackPercentBooking,
        private float $cashBackPercentDeliveryInner,
        private float $cashBackPercentDeliveryInnerToDoor,
        private float $firstOrdersCashbackCountLimit,
        private string $firstOrdersCashbackType,
        private float $firstOrdersCashback,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['cashBackPercentDelivery'] ?? 0,
            $data['cashBackPercentPickup'] ?? 0,
            $data['cashBackPercentBooking'] ?? 0,
            $data['cashBackPercentDeliveryInner'] ?? 0,
            $data['cashBackPercentDeliveryInnerToDoor'] ?? 0,
            $data['firstOrdersCashbackCountLimit'] ?? 0,
            $data['firstOrdersCashbackType'] ?? CashbackType::PERCENT->value,
            $data['firstOrdersCashback'] ?? 0,
        );
    }

    public function toArray(): array
    {
        return [
            'cashBackPercentDelivery' => $this->getCashBackPercentDelivery(),
            'cashBackPercentPickup' => $this->getCashBackPercentPickup(),
            'cashBackPercentBooking' => $this->getCashBackPercentBooking(),
            'cashBackPercentDeliveryInner' => $this->getCashBackPercentDeliveryInner(),
            'cashBackPercentDeliveryInnerToDoor' => $this->getCashBackPercentDeliveryInnerToDoor(),
            'firstOrdersCashbackCountLimit' => $this->getFirstOrdersCashbackCountLimit(),
            'firstOrdersCashbackType' => $this->getFirstOrdersCashbackType(),
            'firstOrdersCashback' => $this->getFirstOrdersCashback(),
        ];
    }

    public function getFirstOrdersCashbackCountLimit(): float
    {
        return $this->firstOrdersCashbackCountLimit;
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

    public function getFirstOrdersCashbackType(): string
    {
        return $this->firstOrdersCashbackType;
    }

    public function getFirstOrdersCashback(): float
    {
        return $this->firstOrdersCashback;
    }
}