<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SimilarItemPost extends Component
{
    
    public $post=null;
    public function __construct($item)
    {
        $this->post=$item;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $item=$this->post;
        return view('components.similar-item-post',compact('item'));
    }
}
