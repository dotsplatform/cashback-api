<?php
/**
 * Description of StoreTransactionDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\DTO\Request;


class StoreTransactionDTO
{
    private string $phone;
    private int $amount;
    private string $note;

    private function __construct(
        string $phone,
        int $amount,
        string $note
    )
    {
        $this->phone = $phone;
        $this->amount = $amount;
        $this->note = $note;
    }

    /**
     * @param array $data
     * @return StoreTransactionDTO
     */
    public static function fromArray(array $data): StoreTransactionDTO
    {
        return new self(
            $data['phone'] ?? '',
            $data['amount'] ?? 0,
            $data['note'] ?? ''
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'phone' => $this->getPhone(),
            'amount' => $this->getAmount(),
            'note' => $this->getNote(),
        ];
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }
}