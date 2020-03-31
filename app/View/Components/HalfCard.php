<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HalfCard extends Component
{
    public $title;
    
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.half-card');
    }
}
