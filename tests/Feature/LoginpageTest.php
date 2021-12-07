<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginpageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login_using_the_login_form()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/');
    }

    public function test_user_can_not_access_admin_pages()
    {

        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $this->get('/admin/admin/users');

        $response->assertRedirect('/');
    }


    public function test_user_can_access_admin_pages()
    {

        $user = User::factory()->create();

        $user->roles()->attach(1);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response = $this->get('/admin/admin/users');

        $response->assertSee('Users');
    }



}
