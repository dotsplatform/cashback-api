<?php
/**
 * Description of SyrveLoyaltyProgramOptionsListItem.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response\Syrve\Loyalty;


use Illuminate\Contracts\Support\Arrayable;

class SyrveLoyaltyProgramOptionsListItem implements Arrayable
{
    protected function __construct(
        private string $id,
        private string $name,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['id'],
            $data['name'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
        ];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}