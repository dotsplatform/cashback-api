<?php
/**
 * Description of UserGroupDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\Users;

use Dots\Data\DTO;

class UsersFiltersDTO extends DTO
{
    protected string $accountId;

    protected ?string $userGroupId = null;

    protected ?array $userTokens = null;

    protected int $limit = 50;

    protected int $offset = 0;

    public function getAccountId(): string
    {
        return $this->accountId;
    }

    public function getUserGroupId(): ?string
    {
        return $this->userGroupId;
    }

    public function getUserTokens(): ?array
    {
        return $this->userTokens;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }
}
