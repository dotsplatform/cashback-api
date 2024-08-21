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
        private bool $ordersCashbackAvailable,
        private bool $firstOrdersCashbackAvailable,
        private float $cashBackPercentDelivery,
        private float $cashBackPercentPickup,
        private float $cashBackPercentBooking,
        private float $cashBackPercentDeliveryInner,
        private float $cashBackPercentDeliveryInnerToDoor,
        private float $firstOrdersLimit,
        private string $firstOrdersCashbackType,
        private float $firstOrdersCashbackAmount,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['ordersCashbackAvailable'] ?? false,
            $data['firstOrdersCashbackAvailable'] ?? false,
            $data['cashBackPercentDelivery'] ?? 0,
            $data['cashBackPercentPickup'] ?? 0,
            $data['cashBackPercentBooking'] ?? 0,
            $data['cashBackPercentDeliveryInner'] ?? 0,
            $data['cashBackPercentDeliveryInnerToDoor'] ?? 0,
            $data['firstOrdersLimit'] ?? 0,
            $data['firstOrdersCashbackType'] ?? CashbackType::PERCENT->value,
            $data['firstOrdersCashbackAmount'] ?? 0,
        );
    }

    public function toArray(): array
    {
        return [
            'ordersCashbackAvailable' => $this->isOrdersCashbackAvailable(),
            'firstOrdersCashbackAvailable' => $this->isFirstOrdersCashbackAvailable(),
            'cashBackPercentDelivery' => $this->getCashBackPercentDelivery(),
            'cashBackPercentPickup' => $this->getCashBackPercentPickup(),
            'cashBackPercentBooking' => $this->getCashBackPercentBooking(),
            'cashBackPercentDeliveryInner' => $this->getCashBackPercentDeliveryInner(),
            'cashBackPercentDeliveryInnerToDoor' => $this->getCashBackPercentDeliveryInnerToDoor(),
            'firstOrdersLimit' => $this->getFirstOrdersLimit(),
            'firstOrdersCashbackType' => $this->getFirstOrdersCashbackType(),
            'firstOrdersCashbackAmount' => $this->getFirstOrdersCashbackAmount(),
        ];
    }

    public function isOrdersCashbackAvailable(): bool
    {
        return $this->ordersCashbackAvailable;
    }

    public function isFirstOrdersCashbackAvailable(): bool
    {
        return $this->firstOrdersCashbackAvailable;
    }

    public function getFirstOrdersLimit(): float
    {
        return $this->firstOrdersLimit;
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

    public function getFirstOrdersCashbackAmount(): float
    {
        return $this->firstOrdersCashbackAmount;
    }
}