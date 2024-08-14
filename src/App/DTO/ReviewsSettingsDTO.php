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
        private string $reviewsCashbackType,
        private float $reviewsCashback,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['reviewsCashbackLimit'] ?? 0,
            $data['reviewsCashbackType'] ?? CashbackType::PERCENT->value,
            $data['reviewsCashback'] ?? 0,
        );
    }

    public function toArray(): array
    {
        return [
            'reviewsCashbackLimit' => $this->getReviewsCashbackLimit(),
            'reviewsCashbackType' => $this->getReviewsCashbackType(),
            'reviewsCashback' => $this->getReviewsCashback(),
        ];
    }

    public function getReviewsCashbackLimit(): float
    {
        return $this->reviewsCashbackLimit;
    }

    public function getReviewsCashbackType(): string
    {
        return $this->reviewsCashbackType;
    }

    public function getReviewsCashback(): float
    {
        return $this->reviewsCashback;
    }
}