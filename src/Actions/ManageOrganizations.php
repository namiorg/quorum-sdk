<?php

namespace NAMI\QuorumSdk\Actions;

use NAMI\QuorumSdk\Resources\Organization;

trait ManageOrganizations
{
    public function organization(int $id): Organization
    {
        $organizationAttributes = $this->get("organization/{$id}");
        return new Organization($organizationAttributes, $this);
    }

    public function organizations(array $options = []): array
    {
        return $this->transformCollection(
            $this->get('organization', $options)['objects'],
            Organization::class
        );
    }
}
