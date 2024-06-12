<?php

namespace App\View\Components\Table\Actions;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteAction extends Component
{
    public $permission;

    public $url;

    /**
     * Create a new component instance.
     */
    public function __construct($url, $permission = null)
    {
        $this->permission = $permission;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.actions.delete-action');
    }
}
