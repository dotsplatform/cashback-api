<?php
/**
 * Description of StoreUsersTransactionParamsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


class StoreUsersTransactionParamsDTO
{
    public const APPLY_TYPE_ABSOLUTE = 10;
    public const APPLY_TYPE_RELATIVE = 20;

    private string $account;
    private int $applyType;
    private StoreUserTransactionsList $transactions;

    private function __construct(
        string $account,
        int $applyType,
        StoreUserTransactionsList $transactions,
    ) {
        $this->account = $account;
        $this->applyType = $applyType;
        $this->transactions = $transactions;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['account'],
            $data['applyType'] ?? self::APPLY_TYPE_RELATIVE,
            StoreUserTransactionsList::fromArray($data['transactions'] ?? [])
        );
    }

    public function getAccount(): string
    {
        return $this->account;
    }

    public function getApplyType(): int
    {
        return $this->applyType;
    }

    public function getTransactions(): StoreUserTransactionsList
    {
        return $this->transactions;
    }
}