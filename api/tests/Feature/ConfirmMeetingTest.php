<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class ConfirmMeetingTest extends TestCase
{
    public function testDefaultActionWorks(): void
    {
        $got = $this->get('/meeting/2/confirm');
        $this->assertEquals(200, $got->getStatusCode());
    }
}
