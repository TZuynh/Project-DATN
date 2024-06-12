<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Datatable extends Component
{
    public $id;

    /**
     * @var array|int[]
     */
    public array $menuLength;

    /**
     * @var int
     */
    public $pageLength;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $id = 'datatable-id',
        array $menuLength = [7, 10, 20, 50],
        $pageLength = 10
    ) {
        $this->id = $id;
        $this->menuLength = $menuLength;
        $this->pageLength = $pageLength;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.datatable');
    }
}
