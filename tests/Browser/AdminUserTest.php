<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminUserTest extends DuskTestCase
{
    public function url()
    {
        return '/admin/users';
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
     * Tests if the login button works when a faulty email is entered.
     *
     * @return void
     */
    public function testFaultyEmail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                    ->assertPathIs($this->url())
                    ->assertVisible('@users')
                    ->click('@approve-1')
                    ->assertMissing('@user-1')
                    ->click('@approve-2')
                    ->assertMissing('@user-2')
                    ->assertSee('Geen gebruikers gevonden.');
        });
    }
}
