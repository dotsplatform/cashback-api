<?php
/**
 * Description of SettingsDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\DTO;


class SettingsDTO
{
    /** @var float */
    private $cashBackPercentDelivery;
    /** @var float */
    private $cashBackPercentPickup;
    /** @var float */
    private $cashBackPercentBooking;
    /** @var float */
    private $cashBackPercentDeliveryInner;
    /** @var float */
    private $cashBackPercentDeliveryInnerToDoor;
    /** @var float */
    private $minChargeAmount;

    private function __construct(
        float $cashBackPercentDelivery,
        float $cashBackPercentPickup,
        float $cashBackPercentBooking,
        float $cashBackPercentDeliveryInner,
        float $cashBackPercentDeliveryInnerToDoor,
        float $minChargeAmount
    )
    {
        $this->cashBackPercentDelivery = $cashBackPercentDelivery;
        $this->cashBackPercentPickup = $cashBackPercentPickup;
        $this->cashBackPercentBooking = $cashBackPercentBooking;
        $this->cashBackPercentDeliveryInner = $cashBackPercentDeliveryInner;
        $this->cashBackPercentDeliveryInnerToDoor = $cashBackPercentDeliveryInnerToDoor;
        $this->minChargeAmount = $minChargeAmount;
    }

    /**
     * @param array $data
     * @return SettingsDTO
     */
    public static function fromArray(array $data): SettingsDTO
    {
        return new self(
            $data['cashBackPercentDelivery'] ?? 0,
            $data['cashBackPercentPickup'] ?? 0,
            $data['cashBackPercentBooking'] ?? 0,
            $data['cashBackPercentDeliveryInner'] ?? 0,
            $data['cashBackPercentDeliveryInnerToDoor'] ?? 0,
            $data['minChargeAmount'] ?? 0
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
        ];
    }

    /**
     * @return float
     */
    public function getCashBackPercentDelivery(): float
    {
        return $this->cashBackPercentDelivery;
    }

    /**
     * @return float
     */
    public function getCashBackPercentPickup(): float
    {
        return $this->cashBackPercentPickup;
    }

    /**
     * @return float
     */
    public function getCashBackPercentBooking(): float
    {
        return $this->cashBackPercentBooking;
    }

    /**
     * @return float
     */
    public function getCashBackPercentDeliveryInner(): float
    {
        return $this->cashBackPercentDeliveryInner;
    }

    /**
     * @return float
     */
    public function getCashBackPercentDeliveryInnerToDoor(): float
    {
        return $this->cashBackPercentDeliveryInnerToDoor;
    }

    /**
     * @return float
     */
    public function getMinChargeAmount(): float
    {
        return $this->minChargeAmount;
    }

}