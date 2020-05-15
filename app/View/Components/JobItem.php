<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JobItem extends Component
{
    public $job;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(object $job)
    {
        $this->job = $job;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.job-item');
    }
}
