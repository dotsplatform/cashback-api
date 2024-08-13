<?php
/**
 * Description of ReviewsSettingsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO;

class ReviewsSettingsDTO
{
    protected function __construct(
        private float $reviewsCashbackLimit,
        private float $cashBackAmount,
        private float $cashBackPercent,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['reviewsCashbackLimit'] ?? 0,
            $data['cashBackAmount'] ?? 0,
            $data['cashBackPercent'] ?? 0,
        );
    }

    public function toArray(): array
    {
        return [
            'reviewsCashbackLimit' => $this->getReviewsCashbackLimit(),
            'cashBackAmount' => $this->getCashBackAmount(),
            'cashBackPercent' => $this->getCashBackPercent(),
        ];
    }

    public function getReviewsCashbackLimit(): float
    {
        return $this->reviewsCashbackLimit;
    }

    public function getCashBackAmount(): float
    {
        return $this->cashBackAmount;
    }

    public function getCashBackPercent(): float
    {
        return $this->cashBackPercent;
    }
}