<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function home_screen_can_be_rendered_if_user_authenticated()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/home');
        $response->assertStatus(200);
    }

    /** @test */
    public function redirect_if_user_not_authenticated()
    {
        $response = $this->get('/home');
        $response->assertRedirect(route('login'));
    }

}
