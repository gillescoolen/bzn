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
                // Wait for the component to load in.
                ->waitFor($this->component(), 5)
                ->click('@normal')
                // Check if the component exists in our page.
                ->assertVisible($this->component());
        });
    }

    /**
     * Check if our component data has legend items.
     *
     * @return void
     */
    public function testComponentData()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                // Wait for the component to load in.
                ->waitFor($this->component(), 5)
                // Check if the 'items' property has some data.
                ->assertVueIsNot('items', null, $this->component());
        });
    }

    /**
     * Check if the legend is hidden on mount.
     *
     * @return void
     */
    public function testHiddenComponent()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                // Wait for the component to load in.
                ->waitFor($this->component(), 5)
                // Check that the 'show' property is false, which means the component is hidden.
                ->assertVue('show', false, $this->component());
        });
    }


    /**
     * Check if the legend shows when clicking the button.
     *
     * @return void
     */
    public function testShownComponent()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                // Wait for the component to load in.
                ->waitFor($this->component(), 5)
                // Clicks on the component.
                ->click('@legend-show')
                // Check that the 'show' property is true, which means the component is shown.
                ->assertVue('show', true, $this->component());
        });
    }
}
