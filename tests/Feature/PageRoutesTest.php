<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageRoutesTest extends TestCase
{
    /**
     * Test top-level page route.
     *
     * @return void
     */
    public function testTopLevelPageRoute()
    {
        $response = $this->get('/pages/page1');
        $response->assertStatus(200);
    }
}
