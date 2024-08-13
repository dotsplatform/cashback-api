<?php
/**
 * Description of StoreOrdersSettingsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;

use Dotsplatform\CashbackApi\DTO\OrdersSettingsDTO;

class StoreOrdersSettingsDTO
{
    protected function __construct(
        private OrdersSettingsDTO $settings,
        private string $name,
        private string $token,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            OrdersSettingsDTO::fromArray($data['settings'] ?? []),
            $data['name'] ?? '',
            $data['token'] ?? ''
        );
    }

    public function toArray(): array
    {
        return [
            'settings' => $this->getSettings()->toArray(),
            'name' => $this->getName(),
            'token' => $this->getToken(),
        ];
    }

    public function getSettings(): OrdersSettingsDTO
    {
        return $this->settings;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getName(): string
    {
        return $this->name;
    }}