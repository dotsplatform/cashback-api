<?php
/**
 * Description of CashbackClient.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi;

use Dotsplatform\CashbackApi\DTO\Request\StoreTransactionDTO;
use Dotsplatform\CashbackApi\DTO\Request\StoreAndUpdateAccountDTO;
use Dotsplatform\CashbackApi\DTO\Request\StoreOrderDTO;
use Dotsplatform\CashbackApi\DTO\Request\UpdateOrderPriceDTO;
use Dotsplatform\CashbackApi\DTO\Request\UpdateTransactionNoteDTO;
use Dotsplatform\CashbackApi\DTO\Response\ResponseAccountDTO;
use Dotsplatform\CashbackApi\DTO\Response\ResponseOrderDTO;
use Dotsplatform\CashbackApi\DTO\Response\ResponseTransactionDTO;
use Dotsplatform\CashbackApi\Http\Exception\InvalidParamsDataException;
use Dotsplatform\CashbackApi\Http\Exception\NotFoundException;
use Dotsplatform\CashbackApi\Http\Exception\ServerErrorException;
use Dotsplatform\CashbackApi\Http\Exception\UnprocessableEntityException;
use Dotsplatform\CashbackApi\Http\HttpClient;

class CashbackClient extends HttpClient
{
    const GET_ACCOUNT_URL_TEMPLATE = '/accounts/{id}';
    const CREATE_ACCOUNT_URL_TEMPLATE = '/accounts';
    const UPDATE_ACCOUNT_URL_TEMPLATE = '/accounts/{id}';
    const GET_ORDER_TRANSACTION_URL_TEMPLATE = '/orders/{id}/transactions';
    const CREATE_ORDER_URL_TEMPLATE = '/orders';
    const UPDATE_ORDER_PRICE_URL_TEMPLATE = '/orders/{id}/price';
    const FINISH_ORDER_URL_TEMPLATE = '/orders/{id}/finish';
    const CANCEL_ORDER_URL_TEMPLATE = '/orders/{id}/cancel';
    const REOPEN_ORDER_URL_TEMPLATE = '/orders/{id}/reopen';
    const GET_TRANSACTION_URL_TEMPLATE = '/transactions';
    const CREATE_TRANSACTION_URL_TEMPLATE = '/transactions';
    const UPDATE_TRANSACTION_NOTE_URL_TEMPLATE = '/transactions/{id}/note';
    const RESOLVE_RECEIVING_AMOUNT_URL_TEMPLATE = '/orders/resolve-receiving-amount';

    public function getAccount(int $id): ResponseAccountDTO
    {
        $url = $this->parseUrlParams(self::GET_ACCOUNT_URL_TEMPLATE, ['id' => $id]);
        return ResponseAccountDTO::fromArray($this->get($url));
    }

    /**
     * @param array $data
     * @return ResponseAccountDTO
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    public function createAccount(array $data): ResponseAccountDTO
    {
        $accountDTO = StoreAndUpdateAccountDTO::fromArray($data);
        $params['json'] = true;
        $responseData = $this->post(self::CREATE_ACCOUNT_URL_TEMPLATE, $accountDTO->toArray(), $params);
        return ResponseAccountDTO::fromArray($responseData);
    }

    /**
     * @param int $id
     * @param array $data
     * @return ResponseAccountDTO
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    public function updateAccount(int $id, array $data): ResponseAccountDTO
    {
        $url = $this->parseUrlParams(self::UPDATE_ACCOUNT_URL_TEMPLATE, ['id' => $id]);
        $params['json'] = true;
        $accountDTO = StoreAndUpdateAccountDTO::fromArray($data);
        $responseData = $this->put($url, $accountDTO->toArray(), $params);
        return ResponseAccountDTO::fromArray($responseData);
    }

    /**
     * @param int $id
     * @param ResponseAccountDTO $accountDTO
     * @return array|ResponseTransactionDTO[]
     */
    public function getOrderTransactions(int $id, ResponseAccountDTO $accountDTO): array
    {
        $url = $this->parseUrlParams(self::GET_ORDER_TRANSACTION_URL_TEMPLATE, ['id' => $id]);
        $params = $this->getRequestHeaders($accountDTO->getToken());
        $params['json'] = true;
        $responseData = $this->get($url, $params);
        return array_map(fn(array $transactionData) => ResponseTransactionDTO::fromArray($transactionData), $responseData);
    }

    /**
     * @param string $accountToken
     * @param array $data
     * @return ResponseOrderDTO
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    public function createOrder(string $accountToken, array $data): ResponseOrderDTO
    {
        $orderDTO = StoreOrderDTO::fromArray($data);
        $params = $this->getRequestHeaders($accountToken);
        $params['json'] = true;
        $responseData = $this->post(self::CREATE_ORDER_URL_TEMPLATE, $orderDTO->toArray(), $params);
        return ResponseOrderDTO::fromArray($responseData);
    }

    /**
     * @param int $id
     * @param string $accountToken
     * @param array $data
     * @return ResponseOrderDTO
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    public function updateOrderPrice(int $id, string $accountToken, array $data): ResponseOrderDTO
    {
        $url = $this->parseUrlParams(self::UPDATE_ORDER_PRICE_URL_TEMPLATE, ['id' => $id]);
        $params = $this->getRequestHeaders($accountToken);
        $params['json'] = true;
        $orderPriceDTO = UpdateOrderPriceDTO::fromArray($data);
        $responseData = $this->patch($url, $orderPriceDTO->toArray(), $params);
        return ResponseOrderDTO::fromArray($responseData);
    }

    /**
     * @param int $id
     * @param string $accountToken
     * @return ResponseOrderDTO
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    public function finishOrder(int $id, string $accountToken): ResponseOrderDTO
    {
        $url = $this->parseUrlParams(self::FINISH_ORDER_URL_TEMPLATE, ['id' => $id]);
        $params = $this->getRequestHeaders($accountToken);
        $responseData = $this->patch($url, null, $params);
        return ResponseOrderDTO::fromArray($responseData);
    }

    /**
     * @param int $id
     * @param string $accountToken
     * @return ResponseOrderDTO
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    public function cancelOrder(int $id, string $accountToken): ResponseOrderDTO
    {
        $url = $this->parseUrlParams(self::CANCEL_ORDER_URL_TEMPLATE, ['id' => $id]);
        $params = $this->getRequestHeaders($accountToken);
        $responseData = $this->patch($url, null, $params);
        return ResponseOrderDTO::fromArray($responseData);
    }

    /**
     * @param int $id
     * @param string $accountToken
     * @return ResponseOrderDTO
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    public function reopenOrder(int $id, string $accountToken): ResponseOrderDTO
    {
        $url = $this->parseUrlParams(self::REOPEN_ORDER_URL_TEMPLATE, ['id' => $id]);
        $params = $this->getRequestHeaders($accountToken);
        $responseData = $this->patch($url, null, $params);
        return ResponseOrderDTO::fromArray($responseData);
    }

    /**
     * @param string $accountToken
     * @param string $token
     * @param array $queryParams
     * @return array
     */
    public function getUserTransactions(string $accountToken, string $token, array $queryParams = []): array
    {
        $params = $this->getRequestHeaders($accountToken);
        $params['query'] = array_merge([
            'token' => $token
        ], $queryParams);
        return $this->get(self::GET_TRANSACTION_URL_TEMPLATE, $params);
    }

    /**
     * @param string $accountToken
     * @param array $data
     * @return ResponseTransactionDTO
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    public function createTransaction(string $accountToken, array $data): ResponseTransactionDTO
    {
        $params = $this->getRequestHeaders($accountToken);
        $params['json'] = true;
        $transactionDTO = StoreTransactionDTO::fromArray($data);
        $responseData = $this->post(self::CREATE_TRANSACTION_URL_TEMPLATE, $transactionDTO->toArray(), $params);
        return ResponseTransactionDTO::fromArray($responseData);
    }

    /**
     * @param string $id
     * @param string $accountToken
     * @param array $data
     * @return ResponseTransactionDTO
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    public function updateTransactionNote(string $id, string $accountToken, array $data): ResponseTransactionDTO
    {
        $url = $this->parseUrlParams(self::UPDATE_TRANSACTION_NOTE_URL_TEMPLATE, ['id' => $id]);
        $params = $this->getRequestHeaders($accountToken);
        $params['json'] = true;
        $transactionNoteDTO = UpdateTransactionNoteDTO::fromArray($data);
        $responseData = $this->patch($url, $transactionNoteDTO->toArray(), $params);
        return ResponseTransactionDTO::fromArray($responseData);
    }

    public function resolveReceivingAmount(string $accountToken, int $orderPrice, int $deliveryType): int
    {
        $params = $this->getRequestHeaders($accountToken);
        $params['query'] = [
            'order_price' => $orderPrice,
            'delivery_type' => $deliveryType,
        ];

        $responseData = $this->get(self::RESOLVE_RECEIVING_AMOUNT_URL_TEMPLATE, $params);
        return $responseData['receiving_amount'];
    }

    private function parseUrlParams(string $url, array $data): string
    {
        foreach ($data as $name => $value) {
            $url = str_replace("{{$name}}", $value, $url);
        }
        return $url;
    }

    private function getRequestHeaders(string $accountToken)
    {
        return ['headers' => ['Account-Token' => $accountToken]];
    }
}