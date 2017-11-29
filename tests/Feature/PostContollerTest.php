<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostContollerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPostCreatePage()
    {
        $response = $this->get('posts/create');

        $response->assertStatus(200)
        ->assertViewIs('posts.create')
        ->assertSeeText('新增');
    }
}
