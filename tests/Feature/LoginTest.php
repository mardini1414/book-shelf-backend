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

    public function test_login_invalid_cred()
    {
        $response = $this->postJson('/api/login', ['email' => 'mardini1414@gmail.com', 'password' => 'kompronk10']);
        $response->assertStatus(200)->assertJson(['message' => 'Your credential dont match']);
    }

    public function test_login_cred_is_empty()
    {
        $response = $this->postJson('/api/login', ['email' => '', 'password' => '']);
        $response->assertStatus(422)->assertJson(['message' => true, 'errors' => true]);
    }
}
