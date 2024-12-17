<?php
/**
 * Description of ResponseUserDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response\UserGroups;

use Dots\Data\DTO;

class ResponseUserGroupDTO extends DTO
{
    protected string $id;

    protected int $account_id;

    protected string $name;

    protected ?array $settings;

    public function getId(): string
    {
        return $this->id;
    }

    public function getAccountId(): int
    {
        return $this->account_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSettings(): ?array
    {
        return $this->settings;
    }
}
