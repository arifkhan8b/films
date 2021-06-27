<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

use Illuminate\Support\Facades\Artisan; 

class LoginControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_displays_the_login_form()
    {

        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    /** @test */
    public function login_displays_validation_errors()
    {
        $response = $this->post('/login', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function login_authenticates_and_redirects_user()
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => 'john@yahoo.com',
            'password' => 123456789
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function register_creates_and_authenticates_a_user()
    {
        // $name = $this->faker->name;
        // $email = $this->faker->safeEmail;
        // $password = $this->faker->password(8);

        $response = $this->post('register', [
            'name' => 'johnk',
            'email' => 'johnk@yahoo.com.us.ts',
            'password' => 123456789,
            'password_confirmation' => 123456789,
        ]);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'name' => 'johnk',
            'email' => 'johnk@yahoo.com.us.ts'
        ]);

    }
}
