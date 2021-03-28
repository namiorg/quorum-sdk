<?php

namespace NAMI\QuorumSdk\Resources;

class Campaign extends ApiResource
{
    public function __construct(array $attributes, $quorum = null)
    {
        parent::__construct($attributes, $quorum);
    }
}
