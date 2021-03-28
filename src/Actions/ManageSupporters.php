<?php

namespace NAMI\QuorumSdk\Actions;

use NAMI\QuorumSdk\Resources\Supporter;

trait ManageSupporters
{
    public function supporter(int $id): Supporter
    {
        $supporterAttributes = $this->get("supporter/{$id}");
        return new Supporter($supporterAttributes, $this);
    }

    public function supporters(array $options = []): array
    {
        return $this->transformCollection(
            $this->get('supporter', $options)['objects'],
            Supporter::class
        );
    }
}
