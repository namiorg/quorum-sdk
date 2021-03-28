<?php

namespace NAMI\QuorumSdk\Resources;

class Supporter extends ApiResource
{
    public function __construct(array $attributes, $quorum = null)
    {
        parent::__construct($attributes, $quorum);
    }
}
