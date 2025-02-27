<?php
/**
 * Description of CreateUserDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\Users;

use Dots\Data\DTO;

class CreateUserDTO extends DTO
{
    protected string $accountToken;

    protected string $token;

    protected string $phone;

    public function getAccountToken(): string
    {
        return $this->accountToken;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
