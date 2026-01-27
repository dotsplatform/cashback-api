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

    public static function fromArray(array $data): static
    {
        $data['items'] = ResponseTransactionsWithOrderAndUser::fromArray($data['items'] ?? []);
        $data['statistics'] = TransactionsStatisticsDTO::fromArray($data['statistics'] ?? []);

        return parent::fromArray($data);
    }

    public function getItems(): ResponseTransactionsWithOrderAndUser
    {
        return $this->items;
    }

    public function getStatistics(): TransactionsStatisticsDTO
    {
        return $this->statistics;
    }
}