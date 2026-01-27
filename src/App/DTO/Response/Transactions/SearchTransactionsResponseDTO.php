<?php
/**
 * Description of SearchTransactionsResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response\Transactions;


use Dots\Data\DTO;
use Dotsplatform\CashbackApi\DTO\Request\Transactions\TransactionsStatisticsDTO;

class SearchTransactionsResponseDTO extends DTO
{
    protected ResponseTransactionsWithOrderAndUser $items;

    protected TransactionsStatisticsDTO $statistics;

    public function getItems(): ResponseTransactionsWithOrderAndUser
    {
        return $this->items;
    }

    public function getStatistics(): TransactionsStatisticsDTO
    {
        return $this->statistics;
    }
}