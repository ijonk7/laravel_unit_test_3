<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function registration_page_can_be_rendered()
    {
        // $this->withoutExceptionHandling();

        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    /** @test */
    public function anyone_can_be_registered()
    {
        $user = User::factory()->make();
        $response = $this->post('/register', $user->toArray());
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
