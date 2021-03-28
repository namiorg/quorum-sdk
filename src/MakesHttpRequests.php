<?php

namespace NAMI\QuorumSdk;

use Exception;
use NAMI\QuorumSdk\Exceptions\FailedActionException;
use NAMI\QuorumSdk\Exceptions\NotFoundException;
use Psr\Http\Message\ResponseInterface;

trait MakesHttpRequests
{
    protected function get(string $uri, array $query = [])
    {
        return $this->request('GET', $uri, $query);
    }

    protected function request(string $verb, string $uri, array $query)
    {

        $response = $this->client->request(
            $verb,
            $uri,
            [
                'query' => array_merge(
                    [
                        'username' => $this->username,
                        'api_key' => $this->apiKey,
                    ],
                    $query
                ),
                // 'debug' => true
            ]
        );

        if (!$this->isSuccessful($response)) {
            return $this->handleRequestError($response);
        }

        $responseBody = (string) $response->getBody();
        return json_decode($responseBody, true) ?: $responseBody;
    }

    public function isSuccessful($response): bool
    {
        if (!$response) {
            return false;
        }
        return (int) substr($response->getStatusCode(), 0, 1) === 2;
    }

    protected function handleRequestError(ResponseInterface $response): void
    {

        if ($response->getStatusCode() === 404) {
            throw new NotFoundException();
        }

        if ($response->getStatusCode() === 400) {
            throw new FailedActionException((string) $response->getBody());
        }

        throw new Exception((string) $response->getBody());
    }
}
