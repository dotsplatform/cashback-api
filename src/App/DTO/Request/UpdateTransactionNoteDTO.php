<?php
/**
 * Description of UpdateTransactionNoteDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\DTO\Request;


class UpdateTransactionNoteDTO
{
    /** @var string */
    private $note;

    private function __construct(string $note)
    {
        $this->note = $note;
    }

    /**
     * @param array $data
     * @return UpdateTransactionNoteDTO
     */
    public static function fromArray(array $data): UpdateTransactionNoteDTO
    {
        return new self(
            $data['note'] ?? ''
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'note' => $this->getNote(),
        ];
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }
}