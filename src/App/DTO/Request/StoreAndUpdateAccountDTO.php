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
    private string $token;

    protected function __construct(
        SettingsDTO $settings,
        string $name,
        string $token
    )
    {
        $this->settings = $settings;
        $this->name = $name;
        $this->token = $token;
    }

    public static function fromArray(array $data): self
    {
        return new static(
            SettingsDTO::fromArray($data['settings'] ?? []),
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

    public function getSettings(): SettingsDTO
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
    }

}