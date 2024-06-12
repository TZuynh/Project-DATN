<?php

namespace App\View\Components\Custom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatBox extends Component
{
    public $boxId;

    public $customCol;

    /**
     * Create a new component instance.
     */
    public function __construct($customCol = '', $id = 'default-id')
    {
        $this->boxId = $id;
        $this->customCol = $customCol;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.custom.stat-box');
    }
}
