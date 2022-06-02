<?php
/**
 * Description of UpdateTransactionNoteDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


class UpdateTransactionNoteDTO
{
    private function __construct(private string $note)
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
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