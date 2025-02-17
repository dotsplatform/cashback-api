<?php
/**
 * Description of TransactionType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response\Syrve\Consts;

enum TransactionType: string
{
    case REFILL_WALLET = 'RefillWallet';
    case PAY_FROM_WALLET = 'PayFromWallet';
    case CANCEL_PAY_FROM_WALLET = 'CancelPayFromWallet';
    case REFILL_WALLET_FROM_ORDER = 'RefillWalletFromOrder';
    case CANCEL_REFILL_WALLET_FROM_ORDER = 'CancelRefillWalletFromOrder';

    public function isCustomerBonusBalanceChangedTransactionType(): bool
    {
        return in_array($this, [
            self::REFILL_WALLET,
            self::PAY_FROM_WALLET,
            self::CANCEL_PAY_FROM_WALLET,
            self::REFILL_WALLET_FROM_ORDER,
            self::CANCEL_REFILL_WALLET_FROM_ORDER,
        ]);
    }
}
