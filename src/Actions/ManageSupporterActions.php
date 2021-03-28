<?php

namespace NAMI\QuorumSdk\Actions;

use NAMI\QuorumSdk\Resources\SupporterAction;

trait ManageSupporterActions
{
    public function supporterAction(int $id): SupporterAction
    {
        $supporterActionAttributes = $this->get("supporteraction/{$id}");
        return new SupporterAction($supporterActionAttributes, $this);
    }

    public function supporterActions(array $options = []): array
    {
        return $this->transformCollection(
            $this->get('supporteraction', $options)['objects'],
            SupporterAction::class
        );
    }
}
