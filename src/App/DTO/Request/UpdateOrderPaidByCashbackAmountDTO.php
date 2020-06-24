<?php
/**
 * Description of UpdateOrderPaidByCacheBackAmountDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


class UpdateOrderPaidByCashbackAmountDTO
{
    private int $paid_by_cash_back_amount;

    private function __construct(
        int $paid_by_cash_back_amount
    )
    {
        $this->paid_by_cash_back_amount = $paid_by_cash_back_amount;
    }

    public static function fromArray(array $data): UpdateOrderPaidByCashbackAmountDTO
    {
        return new self(
            $data['paid_by_cash_back_amount'] ?? 0
        );
    }

    public function toArray(): array
    {
        return [
            'paid_by_cash_back_amount' => $this->getPaidByCacheBackAmount(),
        ];
    }

    public function getPaidByCacheBackAmount(): int
    {
        return $this->paid_by_cash_back_amount;
    }
}