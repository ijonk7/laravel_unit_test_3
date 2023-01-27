<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_loggedin_can_be_logout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/logout');
        $response->assertSessionHas('message')
                 ->assertRedirect('login');
    }

}
