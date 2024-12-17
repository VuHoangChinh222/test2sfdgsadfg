<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class MainMenuItem extends Component
{
    public $itemData=null;
    public function __construct($menu)
    {
        $this->itemData=$menu;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu=$this->itemData;
        $list_sub_menu=Menu::where([['status','=',1],['parent_id','=',$menu->id],['position','=','mainmenu']])
        ->orderBy('sort_order', 'ASC')
        ->get();
        return view('components.main-menu-item',compact('menu','list_sub_menu'));
    }
}
