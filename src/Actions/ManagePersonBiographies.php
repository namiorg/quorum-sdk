<?php

namespace NAMI\QuorumSdk\Actions;

use NAMI\QuorumSdk\Resources\PersonBiography;

trait ManagePersonBiographies
{
    public function personBiography(int $id): PersonBiography
    {
        $personBiographyAttributes = $this->get("personbiography/{$id}");
        return new PersonBiography($personBiographyAttributes, $this);
    }

    public function personBiographies(array $options = []): array
    {
        return $this->transformCollection(
            $this->get('personbiography', $options)['objects'],
            PersonBiography::class
        );
    }
}
