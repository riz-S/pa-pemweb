<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\DataDiri;

class navbar-2 extends Component
{
    public $nama;
    public $foto;
    public $time;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($nama,$foto,$time)
    {
        $this->nama = $nama;
        $this->foto = $foto;
        $this->time = $time;
    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar-2');
    }
}
