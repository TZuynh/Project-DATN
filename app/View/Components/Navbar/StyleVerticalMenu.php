<?php

namespace App\View\Components\Navbar;

use Illuminate\View\Component;

class StyleVerticalMenu extends Component
{
    /**
     * The title.
     *
     * @var string
     */
    public $classes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($classes)
    {
        $this->classes = $classes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar.style-vertical-menu');
    }
}
