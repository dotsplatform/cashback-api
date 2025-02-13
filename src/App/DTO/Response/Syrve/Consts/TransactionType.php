<?php
/**
 * Description of TransactionType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response\Syrve\Consts;

enum TransactionType: string
{
    case REFILL_WALLET_FROM_ORDER = 'RefillWalletFromOrder';
}
