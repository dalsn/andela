<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function testGetAllUser()
    {
        $response = $this->json('GET', 'api/user', [])->assertSuccessful();
    }

    public function testGetUserWithPosts()
    {
        $response = $this->json('GET', 'api/user/1', [])->assertSuccessful();

        $response->assertJson([
            'name' => "Leanne Graham",
            'username' => "Bret",
            'email' => "Sincere@april.biz"
        ]);
    }
}
