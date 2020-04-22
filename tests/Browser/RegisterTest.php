<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    public function url()
    {
        return '/register';
    }

    public function name()
    {
        return 'Tes Tacc';
    }

    public function email()
    {
        return 'test@bzn.nl';
    }

    public function password()
    {
        return 'password';
    }


    /**
     * Tests if the register button works when no data is entered.
     *
     * @return void
     */
    public function testMissingInfo()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                    ->assertPathIs($this->url())
                    ->click('@register')
                    ->assertPathIs($this->url());
        });
    }

    /**
     * Tests if the register button works when a taken email is entered.
     *
     * @return void
     */
    public function testTakenEmail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                    ->assertPathIs($this->url())
                    ->type('@name', 'Ad Min')
                    ->type('@email', 'admin@bzn.nl')
                    ->type('@password', 'password')
                    ->type('@password-conformation', 'password')
                    ->click('@register')
                    ->assertVisible('@email-error');
        });
    }

    /**
     * Tests if the register button works when a faulty password is entered.
     *
     * @return void
     */
    public function testWeakPasswords()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                    ->assertPathIs($this->url())
                    ->type('@name', $this->name())
                    ->type('@email', $this->email())
                    ->type('@password', 'test')
                    ->type('@password-conformation', 'test')
                    ->click('@register')
                    ->assertVisible('@password-error');
        });
    }

    /**
     * Tests if the register button works when a faulty password is entered.
     *
     * @return void
     */
    public function testMismatchedPasswords()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                    ->assertPathIs($this->url())
                    ->type('@name', $this->name())
                    ->type('@email', $this->email())
                    ->type('@password', 'password')
                    ->type('@password-conformation', 'password1')
                    ->click('@register')
                    ->assertVisible('@password-error');
        });
    }

    /**
     * Tests if the register button works when a faulty password is entered.
     *
     * @return void
     */
    public function testCorrectInfo()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                    ->assertPathIs($this->url())
                    ->type('@name', $this->name())
                    ->type('@email', $this->email())
                    ->type('@password', $this->password())
                    ->type('@password-conformation', $this->password())
                    ->click('@register')
                    ->assertPathIsNot('/register');
        });
    }
}
