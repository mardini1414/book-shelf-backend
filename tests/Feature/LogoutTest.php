<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LogoutTest extends TestCase
{

    public function test_logout_failed()
    {
        $response = $this->deleteJson('/api/logout');
        $response->assertStatus(401)->assertJson(['message' => 'Unauthenticated.']);
    }

    public function test_logout_success()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->deleteJson('/api/logout');
        $response->assertStatus(200)->assertJson(['message' => 'Logout was successfully']);
    }
}
