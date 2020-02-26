<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MapTest extends DuskTestCase
{
    /**
     * Check if the map has loaded in correctly
     *
     * @return void
     */
    public function testComponentLoad()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertVue('ready', true, '@map');
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
                ->assertVue('zoom', 12, '@map')
                ->assertVue('center', [0 => 52.370216, 1 => 4.895168], '@map');
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
                ->assertVue('minZoom', 12, '@map')
                ->assertVue('options', ['zoomControl' => false], '@map');
        });
    }
}
