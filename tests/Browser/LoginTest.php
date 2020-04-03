<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function url()
    {
        return '/login';
    }

    public function email()
    {
        return 'admin@bzn.nl';
    }

    public function password()
    {
        return 'password';
    }


    /**
     * Tests if the login button works when no data is entered.
     *
     * @return void
     */
    public function testMissingCredentials()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                    ->assertPathIs($this->url())
                    ->click('@login')
                    ->assertPathIs($this->url());
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
                    ->type('@email', 'faulty@email.com')
                    ->type('@password', 'difficult_password_1!')
                    ->click('@login')
                    ->assertVisible('@error');
        });
    }

    /**
     * Tests if the login button works when a faulty password is entered.
     *
     * @return void
     */
    public function testFaultyPassword()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                    ->assertPathIs($this->url())
                    ->type('@email', $this->email())
                    ->type('@password', 'difficult_password_1!')
                    ->click('@login')
                    ->assertVisible('@error');
        });
    }
    

    /**
     * Tests if the login button works when a faulty password is entered.
     *
     * @return void
     */
    public function testCorrectCredentials()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                    ->assertPathIs($this->url())
                    ->type('@email', $this->email())
                    ->type('@password', $this->password())
                    ->click('@login')
                    ->assertPathIsNot($this->url())
                    ->click('@logout');
        });
    }
}
