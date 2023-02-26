<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminLayout extends Component
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
        return view('layouts.admin', [
            'pageTitle' => $this->pagetitle,
        ]);
    }
}
