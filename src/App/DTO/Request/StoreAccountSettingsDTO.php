<?php
/**
 * Description of StoreAndUpdateAccountDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


use Dotsplatform\CashbackApi\DTO\AccountSettingsDTO;

class StoreAccountSettingsDTO
{
    protected function __construct(
        private AccountSettingsDTO $settings,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            AccountSettingsDTO::fromArray($data['settings'] ?? []),
        );
    }

    public function toArray(): array
    {
        return [
            'settings' => $this->getSettings()->toArray(),
        ];
    }

    public function getSettings(): AccountSettingsDTO
    {
        return $this->settings;
    }
}