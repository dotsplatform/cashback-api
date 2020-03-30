<?php
/**
 * Description of CashbackClient.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\CashbackClient;

use App\DTO\Response\ResponseTransactionNoteDTO;
use App\DTO\Request\StoreAndUpdateAccountDTO;
use App\DTO\Request\StoreOrderDTO;
use App\DTO\Request\UpdateOrderPaidByCacheBackAmountDTO;
use App\DTO\Request\UpdateOrderPriceDTO;
use App\DTO\Request\UpdateTransactionNoteDTO;
use App\DTO\Response\ResponseAccountDTO;
use App\DTO\Response\ResponseOrderDTO;
use App\DTO\Response\ResponseTransactionDTO;
use App\Http\HttpClient;

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

    /**
     * @param int $id
     * @return mixed|null
     */
    public function getAccount(int $id)
    {
        $url = $this->parseUrlParams(self::GET_ACCOUNT_URL_TEMPLATE, $id, 'id');
        return $this->get($url);
    }

    /**
     * @param array $data
     * @return ResponseAccountDTO
     */
    public function createAccount(array $data): ResponseAccountDTO
    {
        $accountDTO = StoreAndUpdateAccountDTO::fromArray($data);
        $responseData = $this->post(self::CREATE_ACCOUNT_URL_TEMPLATE, $accountDTO->toArray());
        return ResponseAccountDTO::fromArray($responseData);
    }

    /**
     * @param int $id
     * @param array $data
     * @return ResponseAccountDTO
     */
    public function updateAccount(int $id, array $data)
    {
        $url = $this->parseUrlParams(self::UPDATE_ACCOUNT_URL_TEMPLATE, $id, 'id');
        $accountDTO = StoreAndUpdateAccountDTO::fromArray($data);
        $responseData = $this->put($url, $accountDTO->toArray());
        return ResponseAccountDTO::fromArray($responseData);
    }

    /**
     * @param int $id
     * @param ResponseAccountDTO $accountDTO
     * @return mixed|null
     */
    public function getOrderTransaction(int $id, ResponseAccountDTO $accountDTO)
    {
        $url = $this->parseUrlParams(self::GET_ORDER_TRANSACTION_URL_TEMPLATE, $id, 'id');
        $params = $this->getRequestHeaders($accountDTO->getExternalKey());
        return $this->get($url, $params);
    }

    /**
     * @param array $data
     * @param ResponseAccountDTO $accountDTO
     * @return ResponseOrderDTO
     */
    public function createOrder(array $data, ResponseAccountDTO $accountDTO)
    {
        $orderDTO = StoreOrderDTO::fromArray($data);
        $params = $this->getRequestHeaders($accountDTO->getExternalKey());
        $responseData = $this->post(self::CREATE_ORDER_URL_TEMPLATE, $orderDTO->toArray(), $params);
        return ResponseOrderDTO::fromArray($responseData);
    }

    /**
     * @param int $id
     * @param ResponseAccountDTO $accountDTO
     * @param array $data
     * @return ResponseOrderDTO
     */
    public function updateOrderPrice(int $id, ResponseAccountDTO $accountDTO, array $data)
    {
        $url = $this->parseUrlParams(self::UPDATE_ORDER_PRICE_URL_TEMPLATE, $id, 'id');
        $params = $this->getRequestHeaders($accountDTO->getExternalKey());
        $orderPriceDTO = UpdateOrderPriceDTO::fromArray($data);
        $responseData = $this->patch($url, $orderPriceDTO->toArray(), $params);
        return ResponseOrderDTO::fromArray($responseData);
    }

    /**
     * @param int $id
     * @param ResponseAccountDTO $accountDTO
     * @param array $data
     * @return ResponseOrderDTO
     */
    public function updateOrderPaidByCacheBackAmount(int $id, ResponseAccountDTO $accountDTO, array $data)
    {
        $url = $this->parseUrlParams(self::UPDATE_ORDER_PAID_BY_CACHE_BACK_AMOUNT_URL_TEMPLATE, $id, 'id');
        $params = $this->getRequestHeaders($accountDTO->getExternalKey());
        $orderPaidByCacheBackAmountDTO = UpdateOrderPaidByCacheBackAmountDTO::fromArray($data);
        $responseData = $this->patch($url, $orderPaidByCacheBackAmountDTO->toArray(), $params);
        return ResponseOrderDTO::fromArray($responseData);
    }

    /**
     * @param int $id
     * @param ResponseAccountDTO $accountDTO
     * @return ResponseOrderDTO
     */
    public function finishOrder(int $id, ResponseAccountDTO $accountDTO)
    {
        $url = $this->parseUrlParams(self::FINISH_ORDER_URL_TEMPLATE, $id, 'id');
        $params = $this->getRequestHeaders($accountDTO->getExternalKey());
        $responseData = $this->patch($url, null, $params);
        return ResponseOrderDTO::fromArray($responseData);
    }

    /**
     * @param int $id
     * @param ResponseAccountDTO $accountDTO
     * @return ResponseOrderDTO
     */
    public function canselOrder(int $id, ResponseAccountDTO $accountDTO)
    {
        $url = $this->parseUrlParams(self::CANSEL_ORDER_URL_TEMPLATE, $id, 'id');
        $params = $this->getRequestHeaders($accountDTO->getExternalKey());
        $responseData = $this->patch($url, null, $params);
        return ResponseOrderDTO::fromArray($responseData);
    }

    /**
     * @param ResponseAccountDTO $accountDTO
     * @return mixed|null
     */
    public function getTransaction(ResponseAccountDTO $accountDTO)
    {
        $params = $this->getRequestHeaders($accountDTO->getExternalKey());
        return $this->get(self::GET_TRANSACTION_URL_TEMPLATE, $params);
    }

    /**
     * @param array $data
     * @param ResponseAccountDTO $accountDTO
     * @return ResponseTransactionDTO
     */
    public function createTransaction(array $data, ResponseAccountDTO $accountDTO)
    {
        $params = $this->getRequestHeaders($accountDTO->getExternalKey());
        $transactionDTO = ResponseTransactionDTO::fromArray($data);
        $responseData = $this->post(self::CREATE_TRANSACTION_URL_TEMPLATE, $transactionDTO->toArray(), $params);
        return ResponseTransactionDTO::fromArray($responseData);
    }

    /**
     * @param int $id
     * @param array $data
     * @param ResponseAccountDTO $accountDTO
     * @return ResponseTransactionNoteDTO
     */
    public function updateTransactionNote(int $id, array $data, ResponseAccountDTO $accountDTO)
    {
        $url = $this->parseUrlParams(self::UPDATE_TRANSACTION_NOTE_URL_TEMPLATE, $id, 'id');
        $params = $this->getRequestHeaders($accountDTO->getExternalKey());
        $transactionNoteDTO = UpdateTransactionNoteDTO::fromArray($data);
        $responseData = $this->patch($url, $transactionNoteDTO->toArray(), $params);
        return ResponseTransactionNoteDTO::fromArray($responseData);
    }

    public function parseUrlParams(string $string, int $value, string $paramName): string
    {
        return str_replace('{$' . $paramName . '}', $value, $string);
    }

    private function getRequestHeaders(string $externalKey)
    {
        return ['headers' => ['Account-Key' => $externalKey]];
    }
}