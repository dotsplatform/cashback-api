<?php
/**
 * Description of StoreAndUpdateAccountDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\DTO\Request;


use App\DTO\SettingsDTO;

class StoreAndUpdateAccountDTO
{
    /** @var SettingsDTO[] */
    private $settings;
    /** @var string */
    private $name;
    /** @var string */
    private $external_key;

    private function __construct(
        array $settings,
        string $name,
        string $external_key
    )
    {
        $this->settings = $settings;
        $this->name = $name;
        $this->external_key = $external_key;
    }

    /**
     * @param array $data
     * @return StoreAndUpdateAccountDTO
     */
    public static function fromArray(array $data): StoreAndUpdateAccountDTO
    {
        return new self(
            $data['settings'] ?? '',
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

}