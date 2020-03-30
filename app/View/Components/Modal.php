<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $id, $class, $title;

    public function __construct($id, $class, $title)
    {
        $this->id = $id;
        $this->class = $class;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
