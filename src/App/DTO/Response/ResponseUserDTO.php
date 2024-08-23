<?php
/**
 * Description of ResponseAccountDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response;


class ResponseUserDTO
{
    private function __construct(
        private int $id,
        private string $token,
        private int $account_id,
        private int $available_balance,
        private int $balance,
        private int $receiving_amount,
        private int $held_amount,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['id'],
            $data['token'],
            $data['account_id'],
            $data['available_balance'],
            $data['balance'],
            $data['receiving_amount'],
            $data['held_amount'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'token' => $this->getToken(),
            'account_id' => $this->getAccountId(),
            'available_balance' => $this->getAvailableBalance(),
            'balance' => $this->getBalance(),
            'receiving_amount' => $this->getReceivingAmount(),
            'held_amount' => $this->getHeldAmount(),
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getAccountId(): int
    {
        return $this->account_id;
    }

    public function getAvailableBalance(): int
    {
        return $this->available_balance;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function getReceivingAmount(): int
    {
        return $this->receiving_amount;
    }

    public function getHeldAmount(): int
    {
        return $this->held_amount;
    }

}
