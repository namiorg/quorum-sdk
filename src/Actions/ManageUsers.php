<?php

namespace NAMI\QuorumSdk\Actions;

use NAMI\QuorumSdk\Resources\User;

trait ManageUsers
{
    public function user(int $id): User
    {
        $userAttributes = $this->get("user/{$id}");
        return new User($userAttributes, $this);
    }

    public function users(array $options = []): array
    {
        return $this->transformCollection(
            $this->get('user', $options)['objects'],
            User::class
        );
    }
}
