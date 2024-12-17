<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class FlashSale extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $product_flash_sale=Product::where([['status','=','1'],['pricesale','>',0]])
        ->orderBy('created_at','desc')
        ->limit(4)
        ->get(); 
        return view('components.flash-sale',compact('product_flash_sale'));
    }
}
