<?php
/**
 * Description of PosterAccountResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response;


class PosterAccountResponse
{
    public const STATUS_ACTIVE = 10;
    public const STATUS_INACTIVE = 0;

    protected function __construct(
        private string $id,
        private string $accountId,
        private int $status,
        private ?string $posterAccount,
        private ?string $posterAccessToken,
        private ?string $posterSystemClientGroupId,
        private ?string $defaultClientGroupsId,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['id'],
            $data['accountId'],
            $data['status'],
            $data['posterAccount'] ?? null,
            $data['posterAccessToken'] ?? null,
            $data['posterSystemClientGroupId'] ?? null,
            $data['defaultClientGroupsId'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'accountId' => $this->accountId,
            'status' => $this->status,
            'posterAccount' => $this->posterAccount,
            'posterAccessToken' => $this->posterAccessToken,
            'posterSystemClientGroupId' => $this->posterSystemClientGroupId,
            'defaultClientGroupsId' => $this->defaultClientGroupsId,
        ];
    }

    public function isActive(): bool
    {
        return $this->getStatus() === self::STATUS_ACTIVE;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAccountId(): int
    {
        return $this->accountId;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getPosterAccount(): ?string
    {
        return $this->posterAccount;
    }

    public function getPosterAccessToken(): ?string
    {
        return $this->posterAccessToken;
    }

    public function getPosterSystemClientGroupId(): ?string
    {
        return $this->posterSystemClientGroupId;
    }

    public function getDefaultClientGroupsId(): ?string
    {
        return $this->defaultClientGroupsId;
    }
}