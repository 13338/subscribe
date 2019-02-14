<?php

namespace Tests\Feature;

use App\Subscribe;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscribeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test First Download
     *
     * @return void
     */
    public function testUniqFile()
    {
        $subscribe = factory(Subscribe::class)->create();

        $response = $this->get('/file/'.$subscribe->file);

        $response->assertStatus(200);
    }

    /**
     * Test Second Download
     *
     * @return void
     */
    public function testNonUniqFile()
    {
        $subscribe = factory(Subscribe::class)->create();

        $response1 = $this->get('/file/'.$subscribe->file);

        $response2 = $this->get('/file/'.$subscribe->file);

        $response2->assertStatus(404);
    }
}
