<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AButton extends Component
{
    public $class, $href;

    public function __construct($class, $href)
    {
        $this->class = $class;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.a-button');
    }
}
