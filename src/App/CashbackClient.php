<?php
/**
 * Description of CashbackClient.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi;

use Dotsplatform\CashbackApi\DTO\Request\StoreAccountDTO;
use Dotsplatform\CashbackApi\DTO\Request\StoreAccountSettingsDTO;
use Dotsplatform\CashbackApi\DTO\Request\StoreOrderDTO;
use Dotsplatform\CashbackApi\DTO\Request\StoreOrdersSettingsDTO;
use Dotsplatform\CashbackApi\DTO\Request\StoreReviewsSettingsDTO;
use Dotsplatform\CashbackApi\DTO\Request\StoreUsersTransactionParamsDTO;
use Dotsplatform\CashbackApi\DTO\Request\UpdateOrderPriceDTO;
use Dotsplatform\CashbackApi\DTO\Request\UpdateTransactionNoteDTO;
use Dotsplatform\CashbackApi\DTO\Response\ResponseAccountDTO;
use Dotsplatform\CashbackApi\DTO\Response\ResponseOrderDTO;
use Dotsplatform\CashbackApi\DTO\Response\ResponseTransactionDTO;
use Dotsplatform\CashbackApi\DTO\Response\ResponseUserDTO;
use Dotsplatform\CashbackApi\Http\Exception\InvalidParamsDataException;
use Dotsplatform\CashbackApi\Http\Exception\NotFoundException;
use Dotsplatform\CashbackApi\Http\Exception\ServerErrorException;
use Dotsplatform\CashbackApi\Http\Exception\UnprocessableEntityException;
use Dotsplatform\CashbackApi\Http\HttpClient;

class CashbackClient extends HttpClient
{
    private const GET_ACCOUNT_URL_TEMPLATE = '/accounts/{id}';
    private const CREATE_ACCOUNT_URL_TEMPLATE = '/accounts';
    private const UPDATE_ACCOUNT_SETTINGS_URL_TEMPLATE = '/accounts/{id}/settings/account';
    private const UPDATE_ACCOUNT_ORDERS_SETTINGS_URL_TEMPLATE = '/accounts/{id}/settings/orders';
    private const UPDATE_ACCOUNT_REVIEWS_SETTINGS_URL_TEMPLATE = '/accounts/{id}/settings/reviews';
    private const GET_ORDER_TRANSACTION_URL_TEMPLATE = '/orders/{id}/transactions';
    private const CREATE_ORDER_URL_TEMPLATE = '/orders';
    private const UPDATE_ORDER_PRICE_URL_TEMPLATE = '/orders/{id}/price';
    private const FINISH_ORDER_URL_TEMPLATE = '/orders/{id}/finish';
    private const CANCEL_ORDER_URL_TEMPLATE = '/orders/{id}/cancel';
    private const REOPEN_ORDER_URL_TEMPLATE = '/orders/{id}/reopen';
    private const ORDER_REVIEW_APPROVED_URL_TEMPLATE = '/orders/{id}/review-approved';

    private const GET_TRANSACTION_URL_TEMPLATE = '/transactions';
    private const CREATE_TRANSACTIONS_URL_TEMPLATE = '/transactions';
    private const UPDATE_TRANSACTION_NOTE_URL_TEMPLATE = '/transactions/{id}/note';
    private const RESOLVE_RECEIVING_AMOUNT_URL_TEMPLATE = '/orders/resolve-receiving-amount';
    private const GET_USER_URL_TEMPLATE = '/users/{id}';

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
        $accountDTO = StoreAccountDTO::fromArray($data);
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
    public function storeAccountSettings(int $id, array $data): ResponseAccountDTO
    {
        $url = $this->parseUrlParams(self::UPDATE_ACCOUNT_SETTINGS_URL_TEMPLATE, ['id' => $id]);
        $params['json'] = true;
        $accountDTO = StoreAccountSettingsDTO::fromArray($data);
        $responseData = $this->put($url, $accountDTO->toArray(), $params);
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
    public function storeAccountOrdersSettings(int $id, array $data): ResponseAccountDTO
    {
        $url = $this->parseUrlParams(self::UPDATE_ACCOUNT_ORDERS_SETTINGS_URL_TEMPLATE, ['id' => $id]);
        $params['json'] = true;
        $settings = StoreOrdersSettingsDTO::fromArray($data);
        $responseData = $this->put($url, $settings->toArray(), $params);
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
    public function storeAccountReviewsSettings(int $id, array $data): ResponseAccountDTO
    {
        $url = $this->parseUrlParams(self::UPDATE_ACCOUNT_REVIEWS_SETTINGS_URL_TEMPLATE, ['id' => $id]);
        $params['json'] = true;
        $settings = StoreReviewsSettingsDTO::fromArray($data);
        $responseData = $this->put($url, $settings->toArray(), $params);
        return ResponseAccountDTO::fromArray($responseData);
    }

    public function reviewApproved(int $id, string $accountToken): void
    {
        $url = $this->parseUrlParams(self::ORDER_REVIEW_APPROVED_URL_TEMPLATE, ['id' => $id]);
        $params = $this->getRequestHeaders($accountToken);
        $this->patch($url, null, $params);
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

    public function createTransactions(StoreUsersTransactionParamsDTO $dto): void
    {
        $params = $this->getRequestHeaders($dto->getAccount());
        $data = [
            'transactions' => $dto->getTransactions()->toArray(),
            'applyType' => $dto->getApplyType(),
        ];
        $params['json'] = true;
        $this->post(self::CREATE_TRANSACTIONS_URL_TEMPLATE, $data, $params);
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

    public function getUser(string $accountToken, string $userToken): ResponseUserDTO
    {
        $params = $this->getRequestHeaders($accountToken);
        $url = $this->parseUrlParams(self::GET_USER_URL_TEMPLATE, [
            'id' => $userToken,
        ]);

        $responseData = $this->get($url, $params);
        return ResponseUserDTO::fromArray($responseData);
    }

    private function parseUrlParams(string $url, array $data): string
    {
        foreach ($data as $name => $value) {
            $url = str_replace("{{$name}}", $value, $url);
        }
        return $url;
    }

    private function getRequestHeaders(string $accountToken): array
    {
        return ['headers' => ['Account-Token' => $accountToken]];
    }
}