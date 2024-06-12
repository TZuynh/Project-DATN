<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormMultipleCheckbox extends Component
{
    /**
     * @var mixed|string
     */
    public $name;

    /**
     * @var mixed|string
     */
    public $id;

    /**
     * @var mixed|string
     */
    public $valueAttribute;

    /**
     * @var mixed|string
     */
    public $label;

    /**
     * @var
     */
    public $dataSource;

    public array $value;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $dataSource,
        $name,
        array $value = [],
        $id = 'sDefaultId',
        $valueAttribute = null,
        $label = 'Default Multiple Checkbox'
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->dataSource = $dataSource;
        $this->valueAttribute = $valueAttribute;
        $this->value = $value;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.form-multiple-checkbox');
    }
}
