<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TaskTest extends DuskTestCase
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
                ->click('@normal')
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
                ->assertVueIsNot('tasks', null, $this->component());
        });
    }

    /**
     * Check if the form is hidden on mount.
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
     * Check if the form shows when clicking the icon.
     *
     * @return void
     */
    public function testShownComponent()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitFor($this->component(), 5)
                ->click('@task-show')
                ->assertVue('show', true, $this->component());
        });
    }
}
