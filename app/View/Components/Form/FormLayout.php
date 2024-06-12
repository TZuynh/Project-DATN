<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormLayout extends Component
{
    public $formId;

    public $formMethod;

    public $formUrl;

    public $customCol;

    /**
     * Create a new component instance.
     */
    public function __construct($formUrl, $formMethod = 'POST', $formId = null, $customCol = '')
    {
        $this->formId = $formId;
        $this->formUrl = $formUrl;
        $this->formMethod = $formMethod;
        $this->customCol = $customCol;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.form-layout');
    }
}
