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
        private ?string $walletId,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['id'],
            $data['name'],
            $data['walletId'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'walletId' => $this->getWalletId(),
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

    public function getWalletId(): ?string
    {
        return $this->walletId;
    }
}