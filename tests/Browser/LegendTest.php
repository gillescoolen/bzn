<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LegendTest extends DuskTestCase
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function component()
    {
        return '@legend';
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
                ->assertVueIsNot('items', null, $this->component());
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
                ->click('@legend-show')
                ->assertVue('show', true, $this->component());
        });
    }
}
