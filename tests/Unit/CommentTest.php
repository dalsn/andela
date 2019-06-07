<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    public function testGetAllComment()
    {
        $response = $this->json('GET', 'api/comment', [])->assertSuccessful();
    }

    public function testGetCommentWithPost()
    {
        $response = $this->json('GET', 'api/comment/10', [])->assertSuccessful();

        $response->assertJsonStructure([
            'postId',
            'id',
            'name',
            'email',
            'body'
        ]);

        $this->assertArrayHasKey('post', json_decode($response->content(), true));
    }
}
