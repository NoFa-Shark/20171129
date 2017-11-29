<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostContollerTest extends TestCase
{
    use WithoutMiddleware;
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

    public function testPostStoreToDatebase()
    {
        $data=[
            'title'=>'title',
            'content'=>'content'
        ];

        $response=$this->post('posts',$data);

        $response->assertStatus(302)
        ->assertRedirect('posts/create')
        ->assertSessionHas('success',true);
    }
}
