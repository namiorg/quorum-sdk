<?php

namespace NAMI\QuorumSdk\Resources;

class PublicOrganization extends ApiResource
{
    public function __construct(array $attributes, $quorum = null)
    {
        parent::__construct($attributes, $quorum);
    }
}
