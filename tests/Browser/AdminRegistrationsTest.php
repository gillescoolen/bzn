<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminRegistrationsTest extends DuskTestCase
{
    public function login_url()
    {
        return '/login';
    }

    public function admin_registrations_url()
    {
        return '/admin/registrations';
    }

    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            #1: Authenticate the user.
            $browser->visit($this->login_url())
                    ->assertPathIs($this->login_url())
                    ->type('@email', 'admin@bzn.nl')
                    ->type('@password', 'password')
                    ->click('@login')
                    ->pause(1000)
                    ->assertPathIsNot($this->login_url());

            #2: Tests if a user disappears when we accept or decline them.
            $browser->visit($this->admin_registrations_url())
                    ->assertPathIs($this->admin_registrations_url())
                    ->waitFor('@users')
                    ->click('@approve-0')
                    ->pause(2000)
                    ->click('@decline-0')
                    ->pause(2000)
                    ->assertSee('Geen gebruikers gevonden.');
        });
    }
}
