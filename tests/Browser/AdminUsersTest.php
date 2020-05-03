<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminUsersTest extends DuskTestCase
{
    public function login_url()
    {
        return '/login';
    }

    public function admin_users_url()
    {
        return '/admin/users';
    }
    
    public function testAddingMunicipalityToUser()
    {
        $this->browse(function (Browser $browser) {
            #1: Login
            $browser->visit($this->login_url())
                    ->assertPathIs($this->login_url())
                    ->type('@email', 'admin@bzn.nl')
                    ->type('@password', 'password')
                    ->click('@login')
                    ->pause(1000)
                    ->assertPathIsNot($this->login_url());

            $browser->visit($this->admin_users_url())
                #2: Visit Admin users page
                ->assertPathIs($this->admin_users_url())
                ->waitFor('@users', 3)

                #3: Set municipality of test-user 1 to 'Horst' 
                ->click('@edit-municipality-0')
                ->waitFor('@municipality-modal')
                ->waitFor('@add-municipality-button', 3)
                ->click('@add-municipality-button')
                ->assertSeeIn('@user-0', 'Horst')

                #3: Set municipality of test-user 2 to 'Tilburg' by selecting the municipality from the dropdown
                ->click('@edit-municipality-1')
                ->waitFor('@municipality-modal')
                ->waitFor('@municipality-button', 3)
                ->click('@municipality-button')
                ->click('li:nth-child(3)')
                ->waitFor('@add-municipality-button', 3)
                ->click('@add-municipality-button')
                ->assertSeeIn('@user-1', 'Tilburg')

                #4: Set municipality of test-user 2 to 'Tilburg'
                ->click('@edit-municipality-2')
                ->waitFor('@municipality-modal')
                ->waitFor('@add-municipality-button', 3)
                ->click('@add-municipality-button')
                ->assertSeeIn('@user-2', 'Tilburg')
                
                #5: Remove municipality from test-user 2
                ->click('@edit-municipality-1')
                ->waitFor('@municipality-modal')
                ->waitFor('@remove-municipality-button', 3)
                ->click('@remove-municipality-button')
                ->assertSeeIn('@user-1', 'Gemeente toewijzen');
        });
    }
}
