<?php
/**
 * Description of SettingsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO;

class SettingsDTO
{
    protected function __construct(
        private AccountSettingsDTO $accountSettings,
        private OrdersSettingsDTO $ordersSettings,
        private ReviewsSettingsDTO $reviewsSettings,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['accountSettings'] ?? AccountSettingsDTO::fromArray([]),
            $data['ordersSettings'] ?? OrdersSettingsDTO::fromArray([]),
            $data['reviewSettings'] ?? ReviewsSettingsDTO::fromArray([]),
        );
    }

    public function toArray(): array
    {
        return [
            'accountSettings' => $this->getAccountSettings()->toArray(),
            'ordersSettings' => $this->getOrdersSettings()->toArray(),
            'reviewSettings' => $this->getReviewsSettings()->toArray(),
        ];
    }

    public function getAccountSettings(): AccountSettingsDTO
    {
        return $this->accountSettings;
    }

    public function getOrdersSettings(): OrdersSettingsDTO
    {
        return $this->ordersSettings;
    }

    public function getReviewsSettings(): ReviewsSettingsDTO
    {
        return $this->reviewsSettings;
    }
}