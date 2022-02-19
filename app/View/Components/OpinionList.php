<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OpinionList extends Component
{
    public $opinions;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($opinions)
    {
        $this->opinions = $opinions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.opinion-list');
    }
}
