<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AlertError extends Component
{
    public $title;
    public $message;
    public $button;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $message, $button)
    {
        $this->title = $title;
        $this->message = $message;
        $this->button = $button;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert-error');
    }
}
