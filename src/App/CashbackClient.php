<?php
/**
 * Description of CashbackClient.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi;

use Dotsplatform\CashbackApi\DTO\Request\Accounts\StoreAccountDTO;
use Dotsplatform\CashbackApi\DTO\Request\Accounts\StoreAccountSettingsDTO;
use Dotsplatform\CashbackApi\DTO\Request\Accounts\StoreFirstOrdersSettingsDTO;
use Dotsplatform\CashbackApi\DTO\Request\Accounts\StoreReviewsSettingsDTO;
use Dotsplatform\CashbackApi\DTO\Request\Orders\StoreOrderDTO;
use Dotsplatform\CashbackApi\DTO\Request\Orders\UpdateOrderPriceDTO;
use Dotsplatform\CashbackApi\DTO\Request\StorePosterAccountRequestDTO;
use Dotsplatform\CashbackApi\DTO\Request\StoreSyrveAccountRequestDTO;
use Dotsplatform\CashbackApi\DTO\Request\Transactions\StoreUsersTransactionParamsDTO;
use Dotsplatform\CashbackApi\DTO\Request\Transactions\UpdateTransactionNoteDTO;
use Dotsplatform\CashbackApi\DTO\Request\UserGroups\StoreUserGroupDTO;
use Dotsplatform\CashbackApi\DTO\Request\UserGroups\StoreUserGroupOrdersSettingsDTO;
use Dotsplatform\CashbackApi\DTO\Request\UserGroups\UserGroupsFiltersDTO;
use Dotsplatform\CashbackApi\DTO\Request\Users\CreateUserDTO;
use Dotsplatform\CashbackApi\DTO\Request\Users\UpdateUserDTO;
use Dotsplatform\CashbackApi\DTO\Request\Users\UsersFiltersDTO;
use Dotsplatform\CashbackApi\DTO\Response\Orders\ResponseOrderDTO;
use Dotsplatform\CashbackApi\DTO\Response\PosterAccountResponse;
use Dotsplatform\CashbackApi\DTO\Response\ResponseAccountDTO;
use Dotsplatform\CashbackApi\DTO\Response\Syrve\Loyalty\SyrveLoyaltyProgramOptionsList;
use Dotsplatform\CashbackApi\DTO\Response\Syrve\Organizations\SyrveOrganizationOptionsList;
use Dotsplatform\CashbackApi\DTO\Response\SyrveAccountResponse;
use Dotsplatform\CashbackApi\DTO\Response\Transactions\ResponseTransactionDTO;
use Dotsplatform\CashbackApi\DTO\Response\UserGroups\ResponseUserGroupDTO;
use Dotsplatform\CashbackApi\DTO\Response\Users\ResponseUserDTO;
use Dotsplatform\CashbackApi\Http\Exception\InvalidParamsDataException;
use Dotsplatform\CashbackApi\Http\Exception\NotFoundException;
use Dotsplatform\CashbackApi\Http\Exception\ServerErrorException;
use Dotsplatform\CashbackApi\Http\Exception\UnprocessableEntityException;
use Dotsplatform\CashbackApi\Http\HttpClient;
use Exception;

class CashbackClient extends HttpClient
{
    private const GET_ACCOUNT_URL_TEMPLATE = '/accounts/{id}';
    private const CREATE_ACCOUNT_URL_TEMPLATE = '/accounts';
    private const UPDATE_ACCOUNT_SETTINGS_URL_TEMPLATE = '/accounts/{id}/settings/account';
    private const UPDATE_ACCOUNT_FIRST_ORDERS_SETTINGS_URL_TEMPLATE = '/accounts/{id}/settings/first-orders';
    private const UPDATE_ACCOUNT_REVIEWS_SETTINGS_URL_TEMPLATE = '/accounts/{id}/settings/reviews';
    private const GET_ORDER_TRANSACTION_URL_TEMPLATE = '/orders/{id}/transactions';
    private const CREATE_ORDER_URL_TEMPLATE = '/orders';
    private const UPDATE_ORDER_PRICE_URL_TEMPLATE = '/orders/{id}/price';
    private const FINISH_ORDER_URL_TEMPLATE = '/orders/{id}/finish';
    private const CANCEL_ORDER_URL_TEMPLATE = '/orders/{id}/cancel';
    private const REOPEN_ORDER_URL_TEMPLATE = '/orders/{id}/reopen';
    private const STORE_ORDER_REVIEW_CASHBACK_URL_TEMPLATE = '/orders/{id}/store-order-review-cashback';
    private const GET_TRANSACTION_URL_TEMPLATE = '/transactions';
    private const CREATE_TRANSACTIONS_URL_TEMPLATE = '/transactions';
    private const UPDATE_TRANSACTION_NOTE_URL_TEMPLATE = '/transactions/{id}/note';
    private const RESOLVE_RECEIVING_AMOUNT_URL_TEMPLATE = '/orders/resolve-receiving-amount';
    private const GET_USER_GROUPS_URL_TEMPLATE = '/users-groups';
    private const GET_USER_GROUP_URL_TEMPLATE = '/users-groups/{id}';
    private const CREATE_USER_GROUP_URL_TEMPLATE = '/users-groups';
    private const UPDATE_USER_GROUP_URL_TEMPLATE = '/users-groups/{id}';
    private const DELETE_USER_GROUP_URL_TEMPLATE = '/users-groups/{id}';
    private const UPDATE_USER_GROUP_ORDERS_SETTINGS_URL_TEMPLATE = '/users-groups/{id}/settings/orders';
    private const DELETE_USER_GROUPS_URL_TEMPLATE = '/users-groups/accounts/{id}';
    private const DISTRIBUTE_USERS_BETWEEN_GROUPS_URL_TEMPLATE = '/users-groups/accounts/{id}/distribute';
    private const GET_USERS_URL_TEMPLATE = '/users';
    private const GET_USER_URL_TEMPLATE = '/users/{id}';
    private const CREATE_USER_URL_TEMPLATE = '/users';
    private const UPDATE_USER_URL_TEMPLATE = '/users/{id}';
    private const SYNC_WITH_POS_USER_URL_TEMPLATE = '/users/{id}/sync-with-pos';
    private const SHOW_CASHBACK_POSTER_ACCOUNT_BY_ACCOUNT = '/accounts/{account}/poster/accounts/by-account';
    private const STORE_POSTER_ACCOUNT = '/accounts/{account}/poster/accounts';
    private const POSTER_WEBHOOKS = '/web-hooks/poster';
    private const SHOW_CASHBACK_SYRVE_ACCOUNT_BY_ACCOUNT = '/accounts/{account}/syrve/accounts/by-account';
    private const STORE_SYRVE_ACCOUNT = '/accounts/{account}/syrve/accounts';
    private const SYRVE_CUSTOMER_BONUS_BALANCE_CHANGED_WEBHOOKS = '/web-hooks/syrve/organizations/{organization}/customers/bonuses/balance-changed';

    private const SYRVE_ACCOUNT_ORGANIZATION_OPTIONS = '/accounts/{account}/syrve/organizations/options';
    private const SYRVE_ACCOUNT_LOYALTY_PROGRAM_OPTIONS = '/accounts/{account}/syrve/loyalty/programs/options';


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
        $url = $this->parseUrlParams(self::UPDATE_ACCOUNT_FIRST_ORDERS_SETTINGS_URL_TEMPLATE, ['id' => $id]);
        $params['json'] = true;
        $settings = StoreFirstOrdersSettingsDTO::fromArray($data);
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

    /**
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     */
    public function storeOrderReviewCashback(int $id, string $accountToken): void
    {
        $url = $this->parseUrlParams(self::STORE_ORDER_REVIEW_CASHBACK_URL_TEMPLATE, ['id' => $id]);
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
        return array_map(
            fn(array $transactionData) => ResponseTransactionDTO::fromArray($transactionData),
            $responseData,
        );
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

    public function getUserGroups(string $accountToken, UserGroupsFiltersDTO $filtersDTO): array
    {
        $params = $this->getRequestHeaders($accountToken);
        $params['query'] = $filtersDTO->toArray();

        $responseData = $this->get(self::GET_USER_GROUPS_URL_TEMPLATE, $params);
        return array_map(
            fn(array $userGroupData) => ResponseUserGroupDTO::fromArray($userGroupData),
            $responseData,
        );
    }

    public function getUserGroup(string $accountToken, string $userGroupId): ResponseUserGroupDTO
    {
        $params = $this->getRequestHeaders($accountToken);
        $url = $this->parseUrlParams(self::GET_USER_GROUP_URL_TEMPLATE, [
            'id' => $userGroupId,
        ]);

        $responseData = $this->get($url, $params);
        return ResponseUserGroupDTO::fromArray($responseData);
    }

    /**
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     */
    public function createUserGroup(StoreUserGroupDTO $dto): ResponseUserGroupDTO
    {
        $data = $dto->toArray();
        $params['json'] = true;
        $response = $this->post(
            self::CREATE_USER_GROUP_URL_TEMPLATE,
            $data,
            $params,
        );

        return ResponseUserGroupDTO::fromArray($response ?? []);
    }

    /**
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     */
    public function updateUserGroup(string $userGroupId, StoreUserGroupDTO $dto): ResponseUserGroupDTO
    {
        $data = $dto->toArray();
        $params['json'] = true;
        $url = $this->parseUrlParams(self::UPDATE_USER_GROUP_URL_TEMPLATE, [
            'id' => $userGroupId,
        ]);
        $response = $this->put(
            $url,
            $data,
            $params,
        );

        return ResponseUserGroupDTO::fromArray($response);
    }

    /**
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     */
    public function deleteUserGroup(string $userGroupId, string $userGroupToTransitionId): void
    {
        $params['json'] = true;
        $params['query'] = [
            'userGroupToTransitionId' => $userGroupToTransitionId,
        ];
        $url = $this->parseUrlParams(self::DELETE_USER_GROUP_URL_TEMPLATE, [
            'id' => $userGroupId,
        ]);

        $this->delete($url, $params);
    }

    /**
     * @param string $id
     * @param array $data
     * @return ResponseUserGroupDTO
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    public function storeUserGroupOrdersSettings(string $id, array $data): ResponseUserGroupDTO
    {
        $url = $this->parseUrlParams(self::UPDATE_USER_GROUP_ORDERS_SETTINGS_URL_TEMPLATE, ['id' => $id]);
        $params['json'] = true;
        $settings = StoreUserGroupOrdersSettingsDTO::fromArray($data);
        $responseData = $this->put($url, $settings->toArray(), $params);
        return ResponseUserGroupDTO::fromArray($responseData);
    }

    /**
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     */
    public function deleteUserGroups(int $accountId): void
    {
        $params['json'] = true;
        $url = $this->parseUrlParams(self::DELETE_USER_GROUPS_URL_TEMPLATE, [
            'id' => $accountId,
        ]);

        $this->delete($url, $params);
    }

    /**
     * @param int $id
     * @return void
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    public function distributeUsersBetweenGroups(int $id): void
    {
        $url = $this->parseUrlParams(self::DISTRIBUTE_USERS_BETWEEN_GROUPS_URL_TEMPLATE, ['id' => $id]);
        $params['json'] = true;
        $this->put($url, [], $params);
    }

    public function getUsers(string $accountToken, UsersFiltersDTO $filtersDTO): array
    {
        $params = $this->getRequestHeaders($accountToken);
        $params['query'] = $filtersDTO->toArray();

        $responseData = $this->get(self::GET_USERS_URL_TEMPLATE, $params);
        return array_map(
            fn(array $userData) => ResponseUserDTO::fromArray($userData),
            $responseData,
        );
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

    public function createUser(CreateUserDTO $dto): ResponseUserDTO
    {
        $data = $dto->toArray();
        $params['json'] = true;
        $response = $this->post(
            self::CREATE_USER_URL_TEMPLATE,
            $data,
            $params,
        );

        return ResponseUserDTO::fromArray($response);
    }

    public function updateUser(string $userId, UpdateUserDTO $dto): ResponseUserDTO
    {
        $data = $dto->toArray();
        $params['json'] = true;
        $url = $this->parseUrlParams(self::UPDATE_USER_URL_TEMPLATE, [
            'id' => $userId,
        ]);
        $response = $this->put(
            $url,
            $data,
            $params,
        );

        return ResponseUserDTO::fromArray($response);
    }

    public function syncWithPOS(string $userId): void
    {
        $url = $this->parseUrlParams(self::SYNC_WITH_POS_USER_URL_TEMPLATE, [
            'id' => $userId,
        ]);
        $this->post($url);
    }

    public function showPosterAccount(int $accountId): ?PosterAccountResponse
    {
        $url = $this->parseUrlParams(self::SHOW_CASHBACK_POSTER_ACCOUNT_BY_ACCOUNT, [
            'account' => $accountId,
        ]);
        $params['json'] = true;
        try {
            $response = $this->get($url, $params);
        } catch (Exception) {
            return null;
        }
        if (empty($response)) {
            return null;
        }

        return PosterAccountResponse::fromArray($response);
    }

    /**
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     */
    public function storePosterAccount(StorePosterAccountRequestDTO $dto): PosterAccountResponse
    {
        $url = $this->parseUrlParams(self::STORE_POSTER_ACCOUNT, ['account' => $dto->getAccountId()]);
        $data = $dto->toArray();
        $params['json'] = true;
        $response = $this->post($url, $data, $params);

        return PosterAccountResponse::fromArray($response ?? []);
    }

    public function posterWebhook(array $data): void
    {
        $params['json'] = true;
        $this->post(self::POSTER_WEBHOOKS, $data, $params);
    }

    public function showSyrveAccount(int $accountId): ?SyrveAccountResponse
    {
        $url = $this->parseUrlParams(self::SHOW_CASHBACK_SYRVE_ACCOUNT_BY_ACCOUNT, [
            'account' => $accountId,
        ]);
        $params['json'] = true;
        try {
            $response = $this->get($url, $params);
        } catch (Exception) {
            return null;
        }
        if (empty($response)) {
            return null;
        }

        return SyrveAccountResponse::fromArray($response);
    }

    public function getSyrveAccountOrganizationOptions(int $accountId): SyrveOrganizationOptionsList
    {
        $url = $this->parseUrlParams(self::SYRVE_ACCOUNT_ORGANIZATION_OPTIONS, [
            'account' => $accountId,
        ]);
        $params['json'] = true;
        try {
            $response = $this->get($url, $params);
        } catch (Exception) {
            return SyrveOrganizationOptionsList::empty();
        }
        if (empty($response)) {
            return SyrveOrganizationOptionsList::empty();
        }

        return SyrveOrganizationOptionsList::fromArray($response);
    }

    public function getSyrveAccountLoyaltyProgramOptions(int $accountId): SyrveLoyaltyProgramOptionsList
    {
        $url = $this->parseUrlParams(self::SYRVE_ACCOUNT_LOYALTY_PROGRAM_OPTIONS, [
            'account' => $accountId,
        ]);
        $params['json'] = true;
        try {
            $response = $this->get($url, $params);
        } catch (Exception) {
            return SyrveLoyaltyProgramOptionsList::empty();
        }
        if (empty($response)) {
            return SyrveLoyaltyProgramOptionsList::empty();
        }

        return SyrveLoyaltyProgramOptionsList::fromArray($response);
    }

    /**
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     */
    public function storeSyrveAccount(StoreSyrveAccountRequestDTO $dto): SyrveAccountResponse
    {
        $url = $this->parseUrlParams(self::STORE_SYRVE_ACCOUNT, ['account' => $dto->getAccountId()]);
        $data = $dto->toArray();
        $params['json'] = true;
        $response = $this->post($url, $data, $params);

        return SyrveAccountResponse::fromArray($response ?? []);
    }

    public function syrveCustomerBonusesBalanceChangedWebhook(string $organization, array $data): void
    {
        $url = $this->parseUrlParams(self::SYRVE_CUSTOMER_BONUS_BALANCE_CHANGED_WEBHOOKS, ['organization' => $organization]);
        $params['json'] = true;
        $this->post($url, $data, $params);
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