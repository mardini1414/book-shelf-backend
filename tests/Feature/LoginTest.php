<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_success()
    {
        $response = $this->postJson('/api/login', ['email' => 'mardini1414@gmail.com', 'password' => 'kompronk14']);
        $response->assertStatus(200)->assertJson(['token' => true]);
    }
}
