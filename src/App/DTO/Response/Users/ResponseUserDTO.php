<?php
/**
 * Description of ResponseUserDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response\Users;

use Dots\Data\DTO;

class ResponseUserDTO extends DTO
{
    protected int $id;

    protected string $token;

    protected int $account_id;

    protected string $account_token;

    protected int $available_balance;

    protected int $balance;

    protected int $receiving_amount;

    protected int $held_amount;

    protected string $user_group_id;

    protected int $user_group_auto_change;

    protected string $cashback_expiration_time;

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

    public function getAccountToken(): string
    {
        return $this->account_token;
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

    public function getUserGroupId(): string
    {
        return $this->user_group_id;
    }

    public function getUserGroupAutoChange(): int
    {
        return $this->user_group_auto_change;
    }

    public function getCashbackExpirationTime(): string
    {
        return $this->cashback_expiration_time;
    }
}
