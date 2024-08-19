<?php
/**
 * Description of StoreOrdersSettingsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;

use Dotsplatform\CashbackApi\DTO\ReviewsSettingsDTO;

class StoreReviewsSettingsDTO
{
    protected function __construct(
        private readonly ReviewsSettingsDTO $settings,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            ReviewsSettingsDTO::fromArray($data['settings'] ?? []),
        );
    }

    public function toArray(): array
    {
        return [
            'settings' => $this->getSettings()->toArray(),
        ];
    }

    public function getSettings(): ReviewsSettingsDTO
    {
        return $this->settings;
    }
}