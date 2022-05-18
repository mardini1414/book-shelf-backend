<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookShelfTest extends TestCase
{
    public function test_can_see_all_books()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->getJson('/api/book');
        $response->assertStatus(200)->assertJson(['data' => true]);
    }

    public function test_can_see_specific_book()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->getJson('/api/book/1');
        $response->assertStatus(200)->assertJson(['id' => true]);
    }

    public function test_can_create_new_book()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('/api/book', ['title' => 'Harry Potter', 'author' => 'Sarkim', 'year' => 1999, 'is_readed' => 0]);
        $response->assertStatus(200)->assertJson(['message' => 'the book has been successfully added']);
    }

    public function test_can_update_book()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->putJson('/api/book/4/update', ['title' => 'Sukizan naik haji', 'author' => 'Sarimin', 'year' => 2010, 'is_readed' => 1]);
        $response->assertStatus(200)->assertJson(['message' => 'the book has been successfully updated']);
    }

    public function test_can_delete_book()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->deleteJson('/api/book/4');
        $response->assertStatus(200)->assertJson(['message' => 'the book has been successfully deleted']);
    }
}
