<?php

namespace App\View\Components\Custom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IframeModal extends Component
{
    /**
     * @var mixed|string
     */
    public $title;

    /**
     * Create a new component instance.
     */
    public function __construct($title = 'Default Title')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.custom.iframe-modal');
    }
}
