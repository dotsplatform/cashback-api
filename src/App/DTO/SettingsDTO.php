<?php
/**
 * Description of SettingsDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO;


class SettingsDTO
{
    protected function __construct(
        private float $cashBackPercentDelivery,
        private float $cashBackPercentPickup,
        private float $cashBackPercentBooking,
        private float $cashBackPercentDeliveryInner,
        private float $cashBackPercentDeliveryInnerToDoor,
        private float $cashBackPercentDeliveryPost,
        private float $minChargeAmount,
        private string $callbackUrl,
        private ?float $maxChargeAmount,
        private ?float $maxChargePercent,
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
            $data['cashBackPercentDeliveryPost'] ?? 0,
            $data['minChargeAmount'] ?? 0,
            $data['callbackUrl'] ?? '',
            $data['maxChargeAmount'] ?? null,
            $data['maxChargePercent'] ?? null,
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
            'cashBackPercentDeliveryPost' => $this->getCashBackPercentDeliveryPost(),
            'minChargeAmount' => $this->getMinChargeAmount(),
            'callbackUrl' => $this->getCallbackUrl(),
            'maxChargeAmount' => $this->getMaxChargeAmount(),
            'maxChargePercent' => $this->getMaxChargePercent(),
        ];
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

    public function getCashBackPercentDeliveryPost(): float
    {
        return $this->cashBackPercentDeliveryPost;
    }

    public function getMinChargeAmount(): float
    {
        return $this->minChargeAmount;
    }

    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    public function getMaxChargeAmount(): ?float
    {
        return $this->maxChargeAmount;
    }

    public function getMaxChargePercent(): ?float
    {
        return $this->maxChargePercent;
    }
}