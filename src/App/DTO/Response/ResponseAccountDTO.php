<?php
/**
 * Description of ResponseAccountDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response;


use Dotsplatform\CashbackApi\DTO\SettingsDTO;

class ResponseAccountDTO
{
    private int $id;
    private SettingsDTO $settings;
    private string $name;
    private string $external_key;

    private function __construct(
        int $id,
        SettingsDTO $settings,
        string $name,
        string $external_key
    )
    {
        $this->id = $id;
        $this->settings = $settings;
        $this->name = $name;
        $this->external_key = $external_key;
    }

    public static function fromArray(array $data): ResponseAccountDTO
    {
        return new static(
            $data['id'] ?? 0,
            SettingsDTO::fromArray($data['settings'] ?? []),
            $data['name'] ?? '',
            $data['external_key'] ?? ''
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'settings' => $this->getSettings(),
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

    public function getId(): int
    {
        return $this->id;
    }
}
