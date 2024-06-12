<?php

namespace App\View\Components\Custom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Timeline extends Component
{
    /**
     * @var mixed|string
     */
    public $timelineTitle;

    /**
     * @var mixed|string
     */
    public $timelines;

    /**
     * @var mixed|string
     */
    public $timelineImg;

    /**
     * Create a new component instance.
     */
    public function __construct($timelines, $timelineImg, $timelineTitle = 'Default Timeline Title')
    {
        $this->timelineTitle = $timelineTitle;
        $this->timelines = $timelines;
        $this->timelineImg = $timelineImg;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.custom.timeline');
    }
}
