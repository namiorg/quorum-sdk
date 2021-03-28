<?php

namespace NAMI\QuorumSdk\Tests;

use \PHPUnit\Framework\TestCase as BaseTestCase;
use Dotenv\Dotenv;
use GuzzleHttp\Client;
use NAMI\QuorumSdk\Quorum;

abstract class TestCase extends BaseTestCase
{
    protected Quorum $quorum;

    public function setup(): void
    {
        parent::setUp();
        $this->loadEnvironmentVariables();
        $apiToken = env('API_KEY');
        $username = env('USERNAME');

        $client = new Client([
            'base_uri' => env('QUORUM_API_URL', 'https://www.quorum.us/api/'),
            'verify' => false,
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    protected function loadEnvironmentVariables()
    {
        if (!file_exists(__DIR__ . '/../.env')) {
            return;
        }
        $dotEnv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotEnv->load();
    }
}
