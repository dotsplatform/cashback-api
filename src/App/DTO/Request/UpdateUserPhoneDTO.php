<?php
/**
 * Description of UpdateUserPhoneDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Igor Abdrazakov <igor@mister.am>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


class UpdateUserPhoneDTO
{
    private string $phone;

    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    public static function fromArray(array $data): self
    {
        return new static(
            $data['phone'] ?? ''
        );
    }

    public function toArray(): array
    {
        return [
            'phone' => $this->phone,
        ];
    }
}