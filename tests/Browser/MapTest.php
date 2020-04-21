<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MapTest extends DuskTestCase
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function component()
    {
        return '@map';
    }

    /**
     * Check if the map has loaded in correctly
     *
     * @return void
     */
    public function testComponentLoad()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                // Check if the component exists in our page.
                ->assertVisible($this->component())
                ->click('@normal')
                // Check that the 'ready' property is true, which means the component is ready.
                ->assertVue('ready', true, $this->component());
        });
    }

    /**
     * Make sure the map defaults to Amsterdam with a zoom level of 12.
     *
     * @return void
     */
    public function testDefaultPosition()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                // Check that the 'zoom' property is 12, which is our default.
                ->assertVue('zoom', 12, $this->component())
                // Check that the 'center' matches municipality Horst.
                ->assertVue('center', [0 => 51.4232255, 1 => 6.0303174], $this->component());
        });
    }

    /**
     * Make sure the zoom controls have been disabled and the minimal zoom amount is set to 12.
     *
     * @return void
     */
    public function testDisabledZoomControls()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                // Check that the 'minZoom' property is 12, which is our default.
                ->assertVue('minZoom', 12, $this->component())
                // Check that the zoom controls have been disabled.
                ->assertVue('options', ['zoomControl' => false], $this->component());
        });
    }
}
