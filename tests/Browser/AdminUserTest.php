<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminUserTest extends DuskTestCase
{
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
                    ->pause(1000)
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
                    ->pause(2000)
                    ->click('@decline-0')
                    ->pause(2000)
                    ->assertSee('Geen gebruikers gevonden.');
        });
    }
}
