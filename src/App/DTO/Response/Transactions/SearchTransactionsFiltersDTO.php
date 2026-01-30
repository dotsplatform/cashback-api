<?php
/**
 * Description of SearchTransactionsFiltersDTO.php
 *
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response\Transactions;

use Dots\Data\DTO;

class SearchTransactionsFiltersDTO extends DTO
{
    protected string $accountId;

    protected ?string $userId = null;

    protected ?int $startTimestamp = null;

    protected ?int $endTimestamp = null;

    protected ?string $timezone = null;

    protected ?int $type = null;

    protected ?int $status = null;

    protected int $limit = 50;

    protected int $offset = 0;

    public function getAccountId(): int
    {
        return $this->accountId;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function getStartTimestamp(): ?int
    {
        return $this->startTimestamp;
    }

    public function getEndTimestamp(): ?int
    {
        return $this->endTimestamp;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
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
