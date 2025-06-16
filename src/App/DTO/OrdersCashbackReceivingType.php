<?php
/**
 * Description of OrdersCashbackReceivingType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO;

enum OrdersCashbackReceivingType: string
{
    case DELIVERY_TYPE = 'delivery';
    case ORDERING_TYPE = 'ordering';
    case PAYMENT_TYPE = 'payment';

    public static function values(): array
    {
        return array_map(fn (self $type): string => $type->value, self::cases());
    }

    public function is(self $type): bool
    {
        return $this === $type;
    }
}