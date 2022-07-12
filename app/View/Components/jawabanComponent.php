<?php

namespace App\View\Components;

use Illuminate\View\Component;

class jawabanComponent extends Component
{
    public $jawaban;
    public $userId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($jawaban,$userId)
    {
        $this->jawaban = $jawaban;
        $this->userId = $userId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.jawaban-component');
    }
}
