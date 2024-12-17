<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class FooterItem extends Component
{
    public $itemData=null;
    public function __construct($footer)
    {
        $this->itemData=$footer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $footer=$this->itemData;
        $list_sub_footer=Menu::where([['status','=',1],['parent_id','=',$footer->id],['position','=','footermenu']])
        ->orderBy('sort_order', 'ASC')
        ->get();
        return view('components.footer-item',compact('list_sub_footer','footer'));
    }
}
