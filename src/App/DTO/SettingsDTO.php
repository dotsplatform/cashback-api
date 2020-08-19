<?php
/**
 * Description of SettingsDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO;


class SettingsDTO
{
    private float $cashBackPercentDelivery;
    private float $cashBackPercentPickup;
    private float $cashBackPercentBooking;
    private float $cashBackPercentDeliveryInner;
    private float $cashBackPercentDeliveryInnerToDoor;
    private float $cashBackPercentDeliveryPost;
    private float $minChargeAmount;
    private string $callbackUrl;

    protected function __construct(
        float $cashBackPercentDelivery,
        float $cashBackPercentPickup,
        float $cashBackPercentBooking,
        float $cashBackPercentDeliveryInner,
        float $cashBackPercentDeliveryInnerToDoor,
        float $cashBackPercentDeliveryPost,
        float $minChargeAmount,
        string $callbackUrl
    )
    {
        $this->cashBackPercentDelivery = $cashBackPercentDelivery;
        $this->cashBackPercentPickup = $cashBackPercentPickup;
        $this->cashBackPercentBooking = $cashBackPercentBooking;
        $this->cashBackPercentDeliveryInner = $cashBackPercentDeliveryInner;
        $this->cashBackPercentDeliveryInnerToDoor = $cashBackPercentDeliveryInnerToDoor;
        $this->cashBackPercentDeliveryPost = $cashBackPercentDeliveryPost;
        $this->minChargeAmount = $minChargeAmount;
        $this->callbackUrl = $callbackUrl;
    }

    public static function fromArray(array $data): SettingsDTO
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
}