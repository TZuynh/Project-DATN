<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BaseLayout extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $scrollspy;

    /**
     * @var bool
     */
    public $isBoxed;

    /**
     * @var bool
     */
    public $isAltMenu;

    /**
     * @var bool
     */
    public $disableHeader;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($scrollspy, $isBoxed = true, $isAltMenu = false, $disableHeader = false)
    {
        $this->scrollspy = $scrollspy;
        $this->isBoxed = $isBoxed;
        $this->isAltMenu = $isAltMenu;
        $this->disableHeader = $disableHeader;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.base-layout');
    }
}
