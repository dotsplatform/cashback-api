<?php
/**
 * Description of StorePosterAccountRequestDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


class StorePosterAccountRequestDTO
{
    protected function __construct(
        private int $accountId,
        private int $status,
        private ?string $posterAccount,
        private ?string $posterAccessToken,
        private ?string $defaultClientGroupsId,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['accountId'],
            $data['status'],
            $data['posterAccount'] ?? null,
            $data['posterAccessToken'] ?? null,
            $data['defaultClientGroupsId'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'accountId' => $this->accountId,
            'status' => $this->status,
            'posterAccount' => $this->posterAccount,
            'posterAccessToken' => $this->posterAccessToken,
            'defaultClientGroupsId' => $this->defaultClientGroupsId,
        ];
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

    public function getDefaultClientGroupsId(): ?string
    {
        return $this->defaultClientGroupsId;
    }
}