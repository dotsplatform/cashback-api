<?php
/**
 * Description of ResponseUserDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Igor Abdrazakov <igor@mister.am>
 */

namespace Dotsplatform\CashbackApi\DTO\Response;


class ResponseUserDTO
{
    private int $id;
    private int $accountId;
    private string $phone;
    private int $availableBalance;
    private int $balance;
    private int $heldAmount;
    private int $receivingAmount;

    public function __construct(
        int $id, int $accountId, string $phone, int $availableBalance, int $balance, int $heldAmount,
        int $receivingAmount
    )
    {
        $this->id = $id;
        $this->accountId = $accountId;
        $this->phone = $phone;
        $this->availableBalance = $availableBalance;
        $this->balance = $balance;
        $this->heldAmount = $heldAmount;
        $this->receivingAmount = $receivingAmount;
    }

    public static function fromArray(array $data): self
    {
        return new static(
            $data['id'],
            $data['accountId'],
            $data['phone'],
            $data['availableBalance'],
            $data['balance'],
            $data['heldAmount'],
            $data['receivingAmount'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAccountId(): int
    {
        return $this->accountId;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getAvailableBalance(): int
    {
        return $this->availableBalance;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function getHeldAmount(): int
    {
        return $this->heldAmount;
    }

    public function getReceivingAmount(): int
    {
        return $this->receivingAmount;
    }
}