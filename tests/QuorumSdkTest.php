<?php

namespace NAMI\QuorumSdk\Tests;

use NAMI\QuorumSdk\Quorum;

class QuorumSdkTest extends TestCase
{
    /** @test */
    public function it_can_instantiate_an_object()
    {
        $quorum = new Quorum('username', 'api-key');
        $this->assertTrue(is_object($quorum));
    }
}
