<?php
/**
 * Description of StorePosterAccountRequestDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


class StoreSyrveAccountRequestDTO
{
    protected function __construct(
        private int $accountId,
        private int $status,
        private ?string $apiLogin,
        private ?string $organizationId,
        private ?string $cashbackLoyaltyProgramId,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['accountId'],
            $data['status'],
            $data['apiLogin'] ?? null,
            $data['organizationId'] ?? null,
            $data['cashbackLoyaltyProgramId'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'accountId' => $this->accountId,
            'status' => $this->status,
            'apiLogin' => $this->apiLogin,
            'organizationId' => $this->organizationId,
            'cashbackLoyaltyProgramId' => $this->cashbackLoyaltyProgramId,
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

    public function getApiLogin(): ?string
    {
        return $this->apiLogin;
    }

    public function getOrganizationId(): ?string
    {
        return $this->organizationId;
    }

    public function getCashbackLoyaltyProgramId(): ?string
    {
        return $this->cashbackLoyaltyProgramId;
    }
}