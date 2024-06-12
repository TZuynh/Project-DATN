<?php

namespace App\View\Components\Custom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tab extends Component
{
    public $tabs;

    /**
     * Create a new component instance.
     */
    public function __construct($tabs)
    {
        $this->tabs = $tabs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.custom.tab');
    }
}
