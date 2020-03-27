<?php
/**
 * Description of HttpClient.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\Http;

use App\Http\Exception\InvalidParamsDataException;
use App\Http\Exception\ServerErrorException;
use App\Http\Exception\UnprocessableEntityException;
use \GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use App\Http\Exception\NotFoundException;
use Psr\Http\Message\ResponseInterface;

abstract class HttpClient
{
    /**
     * @var string
     */
    protected $serviceHost;

    /**
     * @var GuzzleClient
     */
    protected $client;

    /**
     * @param string $serviceHost
     */
    public function __construct($serviceHost)
    {
        $this->serviceHost = $serviceHost;
    }

    /**
     * @return GuzzleClient
     */
    protected function makeClient()
    {
        if (!$this->client) {
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

    protected function get($uri, $params = [])
    {
        $client = $this->makeClient();
        /** @var ResponseInterface $response */
        $response = $client->get($uri, $params);
        $statusCode = $response->getStatusCode();
        if ($statusCode == 404) {
            return null;
        }
        $responseBody = json_decode((string)$response->getBody(), true);

        return $responseBody;
    }

    protected function post($uri, $body = null, $params = [])
    {
        $client = $this->makeClient();
        if (!is_null($body)) {
            if (!empty($params['multipart'])) {
                $params['multipart'] = $body;
            } else if (!empty($params['json'])) {
                $params['json'] = $body;
            } else {
                $params['form_params'] = $body;
            }
        }

        try {
            /** @var ResponseInterface $response */
            $response = $client->post($uri, $params);
        } catch (ClientException $e) {
            $this->parseResponseStatus($e->getResponse());
        }
        $responseBody = (string) $response->getBody();
        return json_decode($responseBody, true);
    }

    protected function patch($uri, $body = null, $params = [])
    {
        $client = $this->makeClient();

        if (!is_null($body)) {
            $params['body'] = $body;
        }

        /** @var ResponseInterface $response */
        $response = $client->patch($uri, $params);

        $responseBody = (string)$response->getBody();
        return json_decode($responseBody, true);
    }

    protected function put($uri, $body = null, $params = [])
    {
        $client = $this->makeClient();

        if (!is_null($body)) {
            if (!empty($params['multipart'])) {
                $params['multipart'] = $body;
            } else {
                $params['form_params'] = $body;
            }
        }
        try {
            /** @var ResponseInterface $response */
            $response = $client->put($uri, $params);
        } catch (ClientException $e) {
            $response = $e->getResponse();
        }

        $this->parseResponseStatus($response);

        $responseBody = (string) $response->getBody(true);
        return json_decode($responseBody, true);
    }

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

}