<?php

namespace NAMI\QuorumSdk\Actions;

use NAMI\QuorumSdk\Resources\PublicOrganization;

trait ManagePublicOrganizations
{
    public function publicOrganization(int $id): PublicOrganization
    {
        $publicOrganizationAttributes = $this->get("publicorganization/{$id}");
        return new PublicOrganization($publicOrganizationAttributes, $this);
    }

    public function publicOrganizations(array $options = []): array
    {
        return $this->transformCollection(
            $this->get('publicorganization', $options)['objects'],
            PublicOrganization::class
        );
    }
}
