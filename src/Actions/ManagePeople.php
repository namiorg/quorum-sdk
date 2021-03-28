<?php

namespace NAMI\QuorumSdk\Actions;

use NAMI\QuorumSdk\Resources\Person;

trait ManagePeople
{
    public function person(int $id): Person
    {
        $personAttributes = $this->get("person/{$id}");
        return new Person($personAttributes, $this);
    }

    public function people(array $options = []): array
    {
        return $this->transformCollection(
            $this->get('person', $options)['objects'],
            Person::class
        );
    }
}
