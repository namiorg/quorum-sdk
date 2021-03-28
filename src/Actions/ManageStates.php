<?php

namespace NAMI\QuorumSdk\Actions;

use NAMI\QuorumSdk\Resources\State;

trait ManageStates
{
    public function state(int $id): State
    {
        $stateAttributes = $this->get("state/{$id}");
        return new State($stateAttributes, $this);
    }

    public function states(array $options = []): array
    {
        return $this->transformCollection(
            $this->get('state', $options)['objects'],
            State::class
        );
    }
}
