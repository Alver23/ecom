<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_index_ok()
    {
        $response = $this->get('profiles');
        $response->assertStatus(200);
    }

    public function test_create_success()
    {
        $this->browse(function ($browser) {
            $this->visit('/profile/create')
                ->type('name', 'Profile TDD')
                ->type('description', 'profile description TDD')
                ->press('Guardar')
                ->assertPathIs('/home');
        });
    }
}
