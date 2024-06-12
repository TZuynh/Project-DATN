<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormRangeSlider extends Component
{
    /**
     * @var mixed|string
     */
    public $minName;

    /**
     * @var mixed|string
     */
    public $maxName;

    /**
     * @var mixed|string
     */
    public $label;

    /**
     * @var mixed|string
     */
    public $id;

    /**
     * @var array|mixed
     */
    public $values;

    /**
     * @var mixed|string
     */
    public $wrapperClasses;

    /**
     * @var mixed|string
     */
    public $datatableId;

    /**
     * @var false|mixed
     */
    public $isFilter;

    public $defaultMinValue;

    public $defaultMaxValue;
    /**
     * @var int|mixed
     */
    public $step;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $defaultMinValue,
        $defaultMaxValue,
        $id = 'sDefaultSelect',
        $minName = 'min_value',
        $maxName = 'max_value',
        $label = '',
        $values = [],
        $wrapperClasses = '',
        $datatableId = 'datatable-id',
        $isFilter = false,
        $step = 1000
    ) {
        $this->defaultMinValue = $defaultMinValue;
        $this->defaultMaxValue = $defaultMaxValue;
        $this->id = $id;
        $this->minName = $minName;
        $this->maxName = $maxName;
        $this->label = $label;
        $this->values = $values;
        $this->wrapperClasses = $wrapperClasses;
        $this->datatableId = $datatableId;
        $this->isFilter = $isFilter;
        $this->step = $step;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.form-range-slider');
    }
}
