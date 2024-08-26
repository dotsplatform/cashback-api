<?php
/**
 * Description of StoreAndUpdateAccountDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;

class StoreAccountDTO
{
    protected function __construct(
        private string $name,
        private string $token,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['name'] ?? '',
            $data['token'] ?? ''
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'token' => $this->getToken(),
        ];
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getName(): string
    {
        return $this->name;
    }
}