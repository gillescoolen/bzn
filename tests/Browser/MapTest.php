<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
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
                ->assertVisible($this->component())
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
                ->assertVue('zoom', 12, $this->component())
                ->assertVue('center', [0 => 52.370216, 1 => 4.895168], $this->component());
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
                ->assertVue('minZoom', 12, $this->component())
                ->assertVue('options', ['zoomControl' => false], $this->component());
        });
    }
}
