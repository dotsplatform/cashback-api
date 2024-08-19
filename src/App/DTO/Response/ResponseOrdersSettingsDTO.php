<?php
/**
 * Description of ResponseAccountDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response;

use Dotsplatform\CashbackApi\DTO\OrdersSettingsDTO;

class ResponseOrdersSettingsDTO
{
    private function __construct(
        private readonly int $id,
        private readonly OrdersSettingsDTO $settings,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['id'] ?? 0,
            OrdersSettingsDTO::fromArray($data['settings'] ?? []),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'settings' => $this->getSettings(),
        ];
    }

    public function getSettings(): OrdersSettingsDTO
    {
        return $this->settings;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
