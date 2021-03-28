<?php

namespace NAMI\QuorumSdk\Actions;

use NAMI\QuorumSdk\Resources\Team;

trait ManageTeams
{
    public function team(int $id): Team
    {
        $teamAttributes = $this->get("team/{$id}");
        return new Team($teamAttributes, $this);
    }

    public function teams(array $options = []): array
    {
        return $this->transformCollection(
            $this->get('team', $options)['objects'],
            Team::class
        );
    }
}
