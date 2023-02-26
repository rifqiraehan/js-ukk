<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PenjualLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    public $pagetitle;

    public function __construct($pagetitle='Canteen Co.')
    {
        $this->pagetitle = $pagetitle;
    }

    public function render()
    {
        return view('layouts.penjual', [
            'pageTitle' => $this->pagetitle,
        ]);
    }
}
