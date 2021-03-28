<?php

namespace NAMI\QuorumSdk\Actions;

use NAMI\QuorumSdk\Resources\PersonRole;

trait ManagePersonRoles
{
    public function personRole(int $id): PersonRole
    {
        $personRoleAttributes = $this->get("personrole/{$id}");
        return new PersonRole($personRoleAttributes, $this);
    }

    public function personRoles(array $options = []): array
    {
        return $this->transformCollection(
            $this->get('personrole', $options)['objects'],
            PersonRoles::class
        );
    }
}
