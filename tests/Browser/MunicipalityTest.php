<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MunicipalityTest extends DuskTestCase
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function component()
    {
        return '@municipality-dropdown';
    }

    /**
     * Check if our component renders.
     *
     * @return void
     */
    public function testComponentLoad()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitFor($this->component(), 5)
                ->assertVisible($this->component());
        });
    }


    /**
     * Check if our component data has municipalities.
     *
     * @return void
     */
    public function testComponentData()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitFor($this->component(), 5)
                ->assertVueIsNot('municipalities', null, $this->component());
        });
    }

    /**
     * Check if the dropdown is hidden on mount.
     *
     * @return void
     */
    public function testHiddenComponent()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitFor($this->component(), 5)
                ->assertVue('show', false, $this->component());
        });
    }

    /**
     * Check if the dropdown shows when clicking the button.
     *
     * @return void
     */
    public function testShownComponent()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitFor($this->component(), 5)
                ->click($this->component())
                ->assertVue('show', true, $this->component());
        });
    }

    /**
     * Check if the selected municipality updates when clicked on.
     *
     * @return void
     */
    public function testSelect()
    {
        $list = '@municipality-list';

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                // Wait for our component to load, click on it and make sure it shows.
                ->waitFor($this->component(), 5)
                ->click($this->component())
                ->assertVue('show', true, $this->component())

                // Wait for the transition to finish and make sure the list is visible.
                ->waitFor($list, 5)
                ->assertVisible($list)

                // Within the list, select the first item.
                ->with($list, function ($li) {
                    $li->click('li:first-child');
                })

                // Check that the selected municipality ID and name don't match our defaults.
                ->assertVueIsNot('municipality.id', 0, $this->component())
                ->assertVueIsNot('municipality.name', 'Amsterdam', $this->component())

                // Check that the list is hidden again.
                ->assertVue('show', false, $this->component());
        });
    }
}
