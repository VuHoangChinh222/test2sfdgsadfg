<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class Footer extends Component
{
    public function __construct()
    {
        //
    }


    public function render(): View|Closure|string
    {
        $footerMenu=Menu::where([['status','=',1],['position','=','footermenu'],['parent_id','=',0]])
        ->orderBy('sort_order', 'ASC')
        ->get();
        return view('components.footer',compact('footerMenu'));
    }
}
