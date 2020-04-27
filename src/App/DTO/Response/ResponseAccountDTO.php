<?php
/**
 * Description of ResponseAccountDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\DTO\Response;


use App\DTO\SettingsDTO;

class ResponseAccountDTO
{
    private int $id;
    private ?array $settings;
    private string $name;
    private string $external_key;

    private function __construct(
        int $id,
        ?array $settings,
        string $name,
        string $external_key
    )
    {
        $this->id = $id;
        $this->settings = $settings;
        $this->name = $name;
        $this->external_key = $external_key;
    }

    /**
     * @param array $data
     * @return ResponseAccountDTO
     */
    public static function fromArray(array $data): ResponseAccountDTO
    {
        return new self(
            $data['id'] ?? 0,
            $data['settings'] ?? null,
            $data['name'] ?? '',
            $data['external_key'] ?? ''
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $settings = array_map(function (SettingsDTO $settingsDTO) {
            return $settingsDTO->toArray();
        }, $this->getSettings());
        return [
            'id' => $this->getId(),
            'settings' => $settings,
            'name' => $this->getName(),
            'external_key' => $this->getExternalKey(),
        ];
    }

    /**
     * @return array|SettingsDTO[]
     */
    public function getSettings(): array
    {
        return $this->settings;
    }

    /**
     * @return string
     */
    public function getExternalKey(): string
    {
        return $this->external_key;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
