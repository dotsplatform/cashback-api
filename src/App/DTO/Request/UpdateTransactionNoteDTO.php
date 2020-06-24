<?php
/**
 * Description of UpdateTransactionNoteDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


class UpdateTransactionNoteDTO
{
    private string $note;

    private function __construct(string $note)
    {
        $this->note = $note;
    }

    public static function fromArray(array $data): UpdateTransactionNoteDTO
    {
        return new self(
            $data['note'] ?? ''
        );
    }

    public function toArray(): array
    {
        return [
            'note' => $this->getNote(),
        ];
    }

    public function getNote(): string
    {
        return $this->note;
    }
}