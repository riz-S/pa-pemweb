<?php

namespace App\View\Components;

use Illuminate\View\Component;

class alert extends Component
{
    public $type;
    public $title;
    public $msg;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $title, $msg)
    {
        $this->type = $type;
        $this->title = $title;
        $this->msg = $msg;    
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
