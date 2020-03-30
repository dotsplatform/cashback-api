<?php
/**
 * Description of ResponseTransactionNoteDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\DTO\Response;


class ResponseTransactionNoteDTO
{
    /** @var string */
    private $phone;
    /** @var integer */
    private $amount;
    /** @var string */
    private $note;

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
     * @return ResponseTransactionNoteDTO
     */
    public static function fromArray(array $data): ResponseTransactionNoteDTO
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