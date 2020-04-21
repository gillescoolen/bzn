<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PDFTest extends DuskTestCase
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function component()
    {
        return '@pdf';
    }

    /**
     * Check if the pdf downloads when clicking the button.
     *
     * @return void
     */
    public function testDownload()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('@normal')
                ->waitFor($this->component(), 5)
                ->click($this->component())
                ->assertVue('text', 'Gedownload!', $this->component())
                ->assertVue('downloaded', true, $this->component());
        });
    }
}
