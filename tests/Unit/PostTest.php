<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    public function testGetAllPost()
    {
        $response = $this->json('GET', 'api/post', [])->assertSuccessful();
    }

    public function testGetPostWithComments()
    {
        $response = $this->json('GET', 'api/post/1', [])->assertSuccessful();

        $response->assertJsonStructure([
            'userId',
            'id',
            'title',
            'body'
        ]);

        $this->assertArrayHasKey('comments', json_decode($response->content(), true));
    }
}
