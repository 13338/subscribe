<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Admin Panel
     *
     * @return void
     */
    public function testAdmin()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get('/admin');

        $response->assertStatus(200);
    }

    /**
     * Test Admin Panel
     *
     * @return void
     */
    public function testNonAdmin()
    {
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();

        $response = $this->actingAs($user2)
            ->get('/admin');

        $response->assertStatus(403);
    }
}
