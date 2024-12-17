<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class SimilarItemProduct extends Component
{
    public $product=null;
    public function __construct($item)
    {
        $this->product=$item;
    }

    public function render(): View|Closure|string
    {
        $item=$this->product;
        return view('components.similar-item-product',compact('item'));
    }
}
