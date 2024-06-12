<?php

namespace App\View\Components\Custom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $breadcrumbItems;

    /**
     * Create a new component instance.
     */
    public function __construct($breadcrumbItems)
    {
        $this->breadcrumbItems = $breadcrumbItems;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.custom.breadcrumb');
    }
}
