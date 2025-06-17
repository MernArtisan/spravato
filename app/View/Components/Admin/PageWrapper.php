<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class PageWrapper extends Component
{
    public $wrapper_reppeater;

    public function __construct($wrapper_reppeater = [])
    {
        $this->wrapper_reppeater = array_merge([
            'title'   => 'Dashboard',
            'section' => 'Home',
            'page'    => 'Dashboard',
            'subpage' => 'Dashboard Overview',
        ], $wrapper_reppeater);
    }


    public function render()
    {
        return view('components.admin.page-wrapper');
    }
}
