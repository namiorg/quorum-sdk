<?php

namespace NAMI\QuorumSdk\Actions;

use NAMI\QuorumSdk\Resources\Campaign;

trait ManageCampaigns
{
    public function campaign(int $id): Campaign
    {
        $campaignAttributes = $this->get("campaign/{$id}");
        return new Campaign($campaignAttributes, $this);
    }

    public function campaigns(array $options = []): array
    {
        return $this->transformCollection(
            $this->get('campaign', $options)['objects'],
            Campaign::class
        );
    }
}
