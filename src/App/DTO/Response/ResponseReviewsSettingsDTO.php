<?php
/**
 * Description of ResponseAccountDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response;

use Dotsplatform\CashbackApi\DTO\ReviewsSettingsDTO;

class ResponseReviewsSettingsDTO
{
    private function __construct(
        private int $id,
        private ReviewsSettingsDTO $settings,
        private string $name,
        private string $token,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['id'] ?? 0,
                ReviewsSettingsDTO::fromArray($data['settings'] ?? []),
            $data['name'] ?? '',
            $data['token'] ?? ''
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'settings' => $this->getSettings(),
            'name' => $this->getName(),
            'token' => $this->getToken(),
        ];
    }

    public function getSettings(): ReviewsSettingsDTO
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

    public function getId(): int
    {
        return $this->id;
    }
}
