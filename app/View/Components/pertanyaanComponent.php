<?php

namespace App\View\Components;

use Illuminate\View\Component;

class pertanyaanComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $pertanyaan;
    public function __construct($pertanyaan)
    {
        $this->pertanyaan = $pertanyaan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pertanyaan-component');
    }
}
