<?php

namespace NAMI\QuorumSdk;

use GuzzleHttp\Client;
use NAMI\QuorumSdk\Actions\ManageCampaigns;
use NAMI\QuorumSdk\Actions\ManageOrganizations;
use NAMI\QuorumSdk\Actions\ManagePeople;
use NAMI\QuorumSdk\Actions\ManagePersonBiographies;
use NAMI\QuorumSdk\Actions\ManagePersonRoles;
use NAMI\QuorumSdk\Actions\ManagePublicOrganizations;
use NAMI\QuorumSdk\Actions\ManageStates;
use NAMI\QuorumSdk\Actions\ManageSupporterActions;
use NAMI\QuorumSdk\Actions\ManageSupporters;
use NAMI\QuorumSdk\Actions\ManageTeams;
use NAMI\QuorumSdk\Actions\ManageUsers;

class Quorum
{
    use MakesHttpRequests,
        ManageCampaigns,
        ManageOrganizations,
        ManagePeople,
        ManagePersonBiographies,
        ManagePersonRoles,
        ManagePublicOrganizations,
        ManageStates,
        ManageSupporterActions,
        ManageSupporters,
        ManageTeams,
        ManageUsers;

    public string $username;
    public string $apiKey;
    public Client $client;

    public function __construct(string $username, string $apiKey, string $baseUri = 'https://www.quorum.us/api/')
    {
        $this->username = $username;
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => $baseUri,
            'http_errors' => false,
            'verify' => false,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    protected function transformCollection(array $collection, string $class): array
    {
        return array_map(function ($attributes) use ($class) {
            return new $class($attributes, $this);
        }, $collection);
    }
}
