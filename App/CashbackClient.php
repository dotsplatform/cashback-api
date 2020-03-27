<?php
/**
 * Description of CashbackClient.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\CashbackClient;

use App\DTO\Request\StoreAccountDTO;
use App\DTO\Response\ResponseAccountDTO;
use App\Http\HttpClient;
use GuzzleHttp\Psr7\Response;

class CashbackClient extends HttpClient
{
    const GET_ACCOUNT_URL_TEMPLATE = '/accounts/{id}';
    const CREATE_ACCOUNT_URL_TEMPLATE = '/accounts';
    const UPDATE_ACCOUNT_URL_TEMPLATE = '/accounts/{id}';
    const GET_ORDER_TRANSACTION_URL_TEMPLATE = '/orders/{id}/transactions';
    const CREATE_ORDER_URL_TEMPLATE = '/orders';
    const UPDATE_ORDER_PRICE_URL_TEMPLATE = '/orders/{id}/price';
    const UPDATE_ORDER_PAID_BY_CACHE_BACK_AMOUNT_URL_TEMPLATE = '/orders/{id}/paid-by-cach-back-amount';
    const FINISH_ORDER_URL_TEMPLATE = '/orders/{id}/finish';
    const CANSEL_ORDER_URL_TEMPLATE = '/orders/{id}/cancel';
    const GET_TRANSACTION_URL_TEMPLATE = '/transactions';
    const CREATE_TRANSACTION_URL_TEMPLATE = '/transactions';
    const UPDATE_TRANSACTION_NOTE_URL_TEMPLATE = '/transactions/{id}/note';

    //get
    public function getAccount(int $id)
    {
       $url = $this->parseUrlParams(self::GET_ACCOUNT_URL_TEMPLATE, $id, 'id');
    }

    public function createAccount(array $data): ResponseAccountDTO
    {
        $accountDTO = StoreAccountDTO::fromArray($data);
        $responseData = $this->post(self::CREATE_ACCOUNT_URL_TEMPLATE, $accountDTO->toArray());
        return ResponseAccountDTO::fromArray($responseData);
    }

    //put
    public function updateAccount(int $id)
    {
        $url = $this->parseUrlParams(self::UPDATE_ACCOUNT_URL_TEMPLATE, $id, 'id');
    }

    //get
    public function getOrderTransaction(int $id)
    {
        $url = $this->parseUrlParams(self::GET_ORDER_TRANSACTION_URL_TEMPLATE, $id, 'id');
    }

    //post
    public function createOrder()
    {
    }
    
    //patch
    public function updateOrderPrice(int $id)
    {
        $url = $this->parseUrlParams(self::UPDATE_ORDER_PRICE_URL_TEMPLATE, $id, 'id');
    }

    //patch
    public function updateOrderPaidByCacheBackAmount(int $id)
    {
        $url = $this->parseUrlParams(self::UPDATE_ORDER_PAID_BY_CACHE_BACK_AMOUNT_URL_TEMPLATE, $id, 'id');
    }

    //patch
    public function finishOrder(int $id)
    {
        $url = $this->parseUrlParams(self::FINISH_ORDER_URL_TEMPLATE, $id, 'id');
    }

    //patch
    public function canselOrder(int $id)
    {
        $url = $this->parseUrlParams(self::CANSEL_ORDER_URL_TEMPLATE, $id, 'id');
    }

    //get
    public function getTransaction()
    {
    }

    //post
    public function createTransaction()
    {
    }

    //patch
    public function updateTransactionNote(int $id)
    {
        $url = $this->parseUrlParams(self::UPDATE_TRANSACTION_NOTE_URL_TEMPLATE, $id, 'id');
    }

    public function parseUrlParams(string $string, int $value, string $paramName): string
    {
        return str_replace('{$' . $paramName . '}', $value, $string);
    }
}