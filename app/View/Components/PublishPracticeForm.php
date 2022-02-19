<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PublishPracticeForm extends Component
{
    public $practice_id; // id of the practice to publish

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->practice_id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.publish-practice-form');
    }
}
