<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminUserTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp() : void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function url()
    {
        return '/admin/registrations';
    }

    /**
     * Authenticate the user.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertPathIs('/login')
                    ->type('@email', 'admin@bzn.nl')
                    ->type('@password', 'password')
                    ->click('@login')
                    ->assertPathIsNot('/login');
        });
    }

    /**
     * Tests if a user disappears when we accept or decline them.
     *
     * @return void
     */
    public function testUserAcceptingAndDeclining()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                    ->assertPathIs($this->url())
                    ->waitFor('@users')
                    ->click('@approve-0')
                    ->pause(1000)
                    ->click('@decline-0')
                    ->pause(1000)
                    ->assertSee('Geen gebruikers gevonden.');
        });
    }
}
