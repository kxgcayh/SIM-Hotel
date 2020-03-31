<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardContent extends Component
{
    /**
     * The card title.
     *
     * @var string
     */
    public $title;
    public $subtitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $subtitle)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card-content');
    }
}
