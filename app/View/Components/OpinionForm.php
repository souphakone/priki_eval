<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OpinionForm extends Component
{
    public $practice_id; // id of the practice on which opinion is provided
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($on)
    {
        $this->practice_id = $on;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.opinion-form');
    }
}
