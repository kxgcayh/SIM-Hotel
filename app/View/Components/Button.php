<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * The card title.
     *
     * @var string
     */
    public $type, $field;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $field)
    {
        $this->type = $type;
        $this->field = $field;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button');
    }
}
