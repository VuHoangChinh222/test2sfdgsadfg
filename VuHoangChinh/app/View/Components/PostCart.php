<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostCart extends Component
{
    public $post_row=null;
    public function __construct($item)
    {
        $this->post_row= $item;   
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $item= $this->post_row;
        return view('components.post-cart',compact('item'));
    }
}
