<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuItem extends Component
{
    public string $title;
    public string $route;
    public string $active;
    public string $icon;
    /**
     * Create a new component instance.
     */
    public function __construct(string $title, $route,string $active, $icon)
    {
        $this->title = $title;
        $this->route = $route;
        $this->active = $active;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu-item');
    }
}
