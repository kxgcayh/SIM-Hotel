<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalButton extends Component
{
    public $class, $id, $icon, $name;

    public function __construct($class, $id, $icon, $name)
    {
        $this->class = $class;
        $this->id = $id;
        $this->icon = $icon;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal-button');
    }
}
