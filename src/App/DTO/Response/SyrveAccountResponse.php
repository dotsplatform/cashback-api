<?php
/**
 * Description of PosterAccountResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response;


class SyrveAccountResponse
{
    public const STATUS_ACTIVE = 10;
    public const STATUS_INACTIVE = 0;

    protected function __construct(
        private string $id,
        private string $accountId,
        private int $status,
        private ?string $apiLogin,
        private ?string $organizationId,
        private ?string $cashbackLoyaltyProgramWalletId,
        private bool $syncUsersToSyrveOnRegister,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['id'],
            $data['accountId'],
            $data['status'],
            $data['apiLogin'] ?? null,
            $data['organizationId'] ?? null,
            $data['cashbackLoyaltyProgramWalletId'] ?? null,
            $data['syncUsersToSyrveOnRegister'] ?? true,
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'accountId' => $this->accountId,
            'status' => $this->status,
            'apiLogin' => $this->apiLogin,
            'organizationId' => $this->organizationId,
            'cashbackLoyaltyProgramWalletId' => $this->cashbackLoyaltyProgramWalletId,
            'syncUsersToSyrveOnRegister' => $this->syncUsersToSyrveOnRegister,
        ];
    }

    public function isActive(): bool
    {
        return $this->getStatus() === self::STATUS_ACTIVE;
    }

    public function hasApiLogin(): bool
    {
        return (bool)$this->getApiLogin();
    }

    public function isConfigured(): bool
    {
        if (! $this->getApiLogin()) {
            return false;
        }

        return $this->getOrganizationId() && $this->getCashbackLoyaltyProgramWalletId();
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

    public function getApiLogin(): ?string
    {
        return $this->apiLogin;
    }

    public function getOrganizationId(): ?string
    {
        return $this->organizationId;
    }

    public function getCashbackLoyaltyProgramWalletId(): ?string
    {
        return $this->cashbackLoyaltyProgramWalletId;
    }

    public function isNeedToSyncUsersToSyrveOnRegister(): bool
    {
        return $this->syncUsersToSyrveOnRegister;
    }
}