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
    protected string $accountId;

    protected string $phone;

    public function getAccountId(): string
    {
        return $this->accountId;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
