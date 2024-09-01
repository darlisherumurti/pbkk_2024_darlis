<?php
namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Closure;

class MenuTree extends Component
{
    public string $title;
    public string $active;
    public string $icon;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param string $active
     * @param string $icon
     */
    public function __construct(string $title, string $active, string $icon)
    {
        $this->title = $title;
        $this->active = $active;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu-tree');
    }
}
