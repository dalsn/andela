<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    $response = $this->json('GET', '/user', [])->assertStatus(200);

    $response->assertJson([
        'name', 'email', 'username',
    ]);
}
