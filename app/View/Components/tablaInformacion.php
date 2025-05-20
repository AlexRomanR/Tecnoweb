<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tablaInformacion extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $opcional;
    public function __construct($opcional)
    {
        $this->opcional = $opcional;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tabla-informacion');
    }
}
