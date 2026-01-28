<?php
/**
 * Description of TransactionsStatisticsDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\Transactions;


use Illuminate\Contracts\Support\Arrayable;

class TransactionsStatisticsDTO implements Arrayable
{
    protected function __construct(
        private float $withdrawalAmountSum,
        private float $depositAmountSum,
        private int $receivingCount,
        private int $depositCount,
        private float $totalUsersBalance,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['withdrawalAmountSum'] ?? 0,
            $data['depositAmountSum'] ?? 0,
            $data['withdrawalCount'] ?? 0,
            $data['depositCount'] ?? 0,
            $data['totalUsersBalance'] ?? 0,
        );
    }

    public function toArray(): array
    {
        return [
            'withdrawalAmountSum' => $this->getWithdrawalAmountSum(),
            'depositAmountSum' => $this->getDepositAmountSum(),
            'withdrawalCount' => $this->getWithdrawalCount(),
            'depositCount' => $this->getDepositCount(),
            'totalUsersBalance' => $this->getTotalUsersBalance(),
        ];
    }

    public function getWithdrawalAmountSum(): float
    {
        return $this->withdrawalAmountSum;
    }

    public function getDepositAmountSum(): float
    {
        return $this->depositAmountSum;
    }

    public function getWithdrawalCount(): int
    {
        return $this->receivingCount;
    }

    public function getDepositCount(): int
    {
        return $this->depositCount;
    }

    public function getTotalUsersBalance(): float
    {
        return $this->totalUsersBalance;
    }
}