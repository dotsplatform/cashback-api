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
        private bool $available,
        private ?float $limit,
        private string $type,
        private float $amount,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['available'] ?? false,
            $data['limit'] ?? 0,
            $data['type'] ?? CashbackType::PERCENT->value,
            $data['amount'] ?? 0,
        );
    }

    public function toArray(): array
    {
        return [
            'available' => $this->isAvailable(),
            'limit' => $this->getLimit(),
            'type' => $this->getType(),
            'amount' => $this->getAmount(),
        ];
    }

    public function isAvailable(): bool
    {
        return $this->available;
    }

    public function getLimit(): ?float
    {
        return $this->limit;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }
}