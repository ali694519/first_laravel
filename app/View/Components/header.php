<?php

namespace App\View\Components;

use Illuminate\View\Component;

class header extends Component
{

    public $name;
    public $sports;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$sports)
    {
        //
        $this->name = $name;
        $this->sports = $sports;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
