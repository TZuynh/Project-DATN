<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormSelect extends Component
{
    /**
     * @var mixed|string
     */
    public $name;

    /**
     * @var mixed|string
     */
    public $label;

    /**
     * @var mixed|string
     */
    public $id;

    /**
     * @var mixed|string
     */
    public $multiple;

    /**
     * @var mixed|string
     */
    public $dataValues;

    /**
     * @var mixed|string
     */
    public $selectValueAttribute;

    /**
     * @var mixed|string
     */
    public $selectValueLabel;
    /**
     * @var mixed|string
     */
    public $placeholder;

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

    /**
     * Create a new component instance.
     */
    public function __construct(
        $id = 'sDefaultSelect',
        $name = 'default_select',
        $label = '',
        $multiple = false,
        $dataValues = [],
        $selectValueAttribute = 'id',
        $selectValueLabel = 'name',
        $placeholder = 'Default Select',
        $values = [],
        $wrapperClasses = '',
        $datatableId = 'datatable-id',
        $isFilter = false
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->multiple = $multiple;
        $this->dataValues = $dataValues;
        $this->selectValueAttribute = $selectValueAttribute;
        $this->selectValueLabel = $selectValueLabel;
        $this->placeholder = $placeholder;
        $this->values = $values;
        $this->wrapperClasses = $wrapperClasses;
        $this->datatableId = $datatableId;
        $this->isFilter = $isFilter;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.form-select');
    }
}
