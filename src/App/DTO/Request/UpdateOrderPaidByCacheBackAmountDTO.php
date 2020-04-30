<?php
/**
 * Description of UpdateOrderPaidByCacheBackAmountDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\DTO\Request;


class UpdateOrderPaidByCacheBackAmountDTO
{
    private int $paid_by_cash_back_amount;

    private function __construct(
        int $paid_by_cash_back_amount
    )
    {
        $this->paid_by_cash_back_amount = $paid_by_cash_back_amount;
    }

    public static function fromArray(array $data): UpdateOrderPaidByCacheBackAmountDTO
    {
        return new self(
            $data['paid_by_cash_back_amount'] ?? 0
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'paid_by_cash_back_amount' => $this->getPaidByCacheBackAmount(),
        ];
    }

    /**
     * @return int
     */
    public function getPaidByCacheBackAmount(): int
    {
        return $this->paid_by_cash_back_amount;
    }
}