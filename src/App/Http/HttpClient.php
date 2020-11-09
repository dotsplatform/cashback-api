<?php
/**
 * Description of HttpClient.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\Http;

use Dotsplatform\CashbackApi\Http\Exception\InvalidParamsDataException;
use Dotsplatform\CashbackApi\Http\Exception\ServerErrorException;
use Dotsplatform\CashbackApi\Http\Exception\UnprocessableEntityException;
use \GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use Dotsplatform\CashbackApi\Http\Exception\NotFoundException;
use Psr\Http\Message\ResponseInterface;

abstract class HttpClient
{
    protected string $serviceHost;
    protected GuzzleClient $client;

    public function __construct()
    {
        $this->serviceHost = config('cashback.cashback-server.url');
    }

    protected function makeClient(): GuzzleClient
    {
        if (!isset($this->client)) {
            $this->client = new GuzzleClient(
                [
                    'base_uri' => $this->serviceHost,
                    'headers' => [
                        'Accept' => 'application/json'
                    ]
                ]
            );
        }

        return $this->client;
    }

    protected function get($uri, $params = []): ?array
    {
        $client = $this->makeClient();
        $response = $client->get($uri, $params);
        $statusCode = $response->getStatusCode();
        if ($statusCode == 404) {
            return null;
        }
        return json_decode((string)$response->getBody(), true);
    }

    /**
     * @param string $uri
     * @param array|null $body
     * @param array $params
     * @return array|null
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    protected function post(string $uri, array $body = null, $params = []): ?array
    {
        $client = $this->makeClient();
        $params = $this->prepareRequestBody($body, $params);

        try {
            $response = $client->post($uri, $params);
        } catch (ClientException $e) {
            $this->parseResponseStatus($e->getResponse());
        }
        $responseBody = (string) $response->getBody();
        return json_decode($responseBody, true);
    }

    /**
     * @param string $uri
     * @param array|null $body
     * @param array $params
     * @return array|null
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    protected function patch(string $uri, array $body = null, $params = []): ?array
    {
        $client = $this->makeClient();

        if (!is_null($body)) {
            if (!empty($params['json'])) {
                $params['json'] = $body;
            }
        }

        try {
            $response = $client->patch($uri, $params);
        } catch (ClientException $e) {
            $this->parseResponseStatus($e->getResponse());
        }

        $responseBody = (string)$response->getBody();
        return json_decode($responseBody, true);
    }

    /**
     * @param string $uri
     * @param array|null $body
     * @param array $params
     * @return array|null
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    protected function put(string $uri, array $body = null, $params = []): ?array
    {
        $client = $this->makeClient();
        $params = $this->prepareRequestBody($body, $params);

        try {
            $response = $client->put($uri, $params);
        } catch (ClientException $e) {
            $response = $e->getResponse();
        }

        $this->parseResponseStatus($response);

        $responseBody = (string) $response->getBody();
        return json_decode($responseBody, true);
    }

    /**
     * @param ResponseInterface $response
     * @throws InvalidParamsDataException
     * @throws NotFoundException
     * @throws ServerErrorException
     * @throws UnprocessableEntityException
     */
    protected function parseResponseStatus(ResponseInterface $response)
    {
        if ($response->getStatusCode() < 400) {
            return;
        }
        if ($response->getStatusCode() == 400) {
            throw new InvalidParamsDataException(json_decode($response->getBody(), true));
        }
        if ($response->getStatusCode() == 422) {
            throw new UnprocessableEntityException(json_decode($response->getBody(), true));
        }
        if ($response->getStatusCode() == 404) {
            throw new NotFoundException(json_decode($response->getBody(), true));
        }
        if ($response->getStatusCode() > 400 && $response->getStatusCode() < 500) {
            throw new InvalidParamsDataException(json_decode($response->getBody(), true));
        }
        throw new ServerErrorException(json_decode($response->getBody(), true));
    }

    private function prepareRequestBody(?array $body, array $params): array
    {
        if (!is_null($body)) {
            if (!empty($params['multipart'])) {
                $params['multipart'] = $body;
            } else if (!empty($params['json'])) {
                $params['json'] = $body;
            } else {
                $params['form_params'] = $body;
            }
        }
        return $params;
    }

}