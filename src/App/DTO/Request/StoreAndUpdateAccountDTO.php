<?php
/**
 * Description of StoreAndUpdateAccountDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


use Dotsplatform\CashbackApi\DTO\SettingsDTO;

class StoreAndUpdateAccountDTO
{
    private SettingsDTO $settings;
    private string $name;
    private string $external_key;

    protected function __construct(
        SettingsDTO $settings,
        string $name,
        string $external_key
    )
    {
        $this->settings = $settings;
        $this->name = $name;
        $this->external_key = $external_key;
    }

    public static function fromArray(array $data): StoreAndUpdateAccountDTO
    {
        return new static(
            SettingsDTO::fromArray($data['settings'] ?? []),
            $data['name'] ?? '',
            $data['external_key'] ?? ''
        );
    }

    public function toArray(): array
    {
        return [
            'settings' => $this->getSettings()->toArray(),
            'name' => $this->getName(),
            'external_key' => $this->getExternalKey(),
        ];
    }

    public function getSettings(): SettingsDTO
    {
        return $this->settings;
    }

    public function getExternalKey(): string
    {
        return $this->external_key;
    }

    public function getName(): string
    {
        return $this->name;
    }

}