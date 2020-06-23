<?php
/**
 * Description of SettingsDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\DTO;


class SettingsDTO
{
    private float $cashBackPercentDelivery;
    private float $cashBackPercentPickup;
    private float $cashBackPercentBooking;
    private float $cashBackPercentDeliveryInner;
    private float $cashBackPercentDeliveryInnerToDoor;
    private float $minChargeAmount;
    private string $livesiteCallbackUrl;
    private string $paymentsCallbackUrl;

    private function __construct(
        float $cashBackPercentDelivery,
        float $cashBackPercentPickup,
        float $cashBackPercentBooking,
        float $cashBackPercentDeliveryInner,
        float $cashBackPercentDeliveryInnerToDoor,
        float $minChargeAmount,
        string $livesiteCallbackUrl,
        string $paymentsCallbackUrl
    )
    {
        $this->cashBackPercentDelivery = $cashBackPercentDelivery;
        $this->cashBackPercentPickup = $cashBackPercentPickup;
        $this->cashBackPercentBooking = $cashBackPercentBooking;
        $this->cashBackPercentDeliveryInner = $cashBackPercentDeliveryInner;
        $this->cashBackPercentDeliveryInnerToDoor = $cashBackPercentDeliveryInnerToDoor;
        $this->minChargeAmount = $minChargeAmount;
        $this->livesiteCallbackUrl = $livesiteCallbackUrl;
        $this->paymentsCallbackUrl = $paymentsCallbackUrl;
    }

    public static function fromArray(array $data): SettingsDTO
    {
        return new self(
            $data['cashBackPercentDelivery'] ?? 0,
            $data['cashBackPercentPickup'] ?? 0,
            $data['cashBackPercentBooking'] ?? 0,
            $data['cashBackPercentDeliveryInner'] ?? 0,
            $data['cashBackPercentDeliveryInnerToDoor'] ?? 0,
            $data['minChargeAmount'] ?? 0,
            $data['livesiteCallbackUrl'] ?? '',
            $data['paymentsCallbackUrl'] ?? '',
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
            'minChargeAmount' => $this->getMinChargeAmount(),
            'livesiteCallbackUrl' => $this->getLivesiteCallbackUrl(),
            'paymentsCallbackUrl' => $this->getPaymentsCallbackUrl(),
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

    public function getMinChargeAmount(): float
    {
        return $this->minChargeAmount;
    }

    public function getLivesiteCallbackUrl(): string
    {
        return $this->livesiteCallbackUrl;
    }

    public function getPaymentsCallbackUrl(): string
    {
        return $this->paymentsCallbackUrl;
    }

}