<?php

namespace App\View\Components\Buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonLink extends Component
{
    public $url;

    /**
     * @var mixed|string
     */
    public $label;

    /**
     * @var mixed|string
     */
    public $type;

    /**
     * Create a new component instance.
     */
    public function __construct($url, $label = 'Btn link', $type = 'primary')
    {
        $this->url = $url;
        $this->label = $label;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.button-link');
    }
}
