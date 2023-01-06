<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MainLayout extends Component
{
    public $pageTitle;
    public $pageDescription;
    public $coverImage;
    public $coverType;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pageTitle, $pageDescription, $coverImage = '', $coverType = "image/webp")
    {
        $this->pageTitle = $pageTitle;
        $this->pageDescription = $pageDescription;

        if($coverImage === '') {
            $this->coverImage = config('app.url').'/images/cover.jpg';
        } else {
            $this->coverImage = $coverImage;
        }

        $this->coverType = $coverType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.main');
    }
}
