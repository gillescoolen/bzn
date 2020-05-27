<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GuidetypesTest extends DuskTestCase
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function component()
    {
        return '@tasks';
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
     * Check if our component data has tasks.
     *
     * @return void
     */
    public function testComponentData()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitFor($this->component(), 5)
                ->pause(2000)
                ->assertVueIsNot('guidetypes', null, $this->component());
        });
    }

    /**
     * Check if the form shows when clicking the icon.
     *
     * @return void
     */
    public function testShownComponent()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitFor('@guide-map', 5)
                ->click('@questionnaire-show')
                ->assertVue('show', true, $this->component());
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
                ->assertVue('minZoom', 12, '@guide-map')
                // Check that the zoom controls have been disabled.
                ->assertVue('options', ['zoomControl' => false, 'preferCanvas' => true], '@guide-map');
        });
    }
}
