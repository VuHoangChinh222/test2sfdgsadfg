<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Post;

class SearchController extends Controller
{
    public function index(){
        return view('frontend.search');
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $search_type=$request->type_search  ;
        
        switch ($request->type_search) {
            case 'product':
                $list_res = Product::where([['name', 'like', "%{$query}%"],['status','=',1]])
                ->orWhere('slug', 'like', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->get();
                break;
            default:
                $list_res = Post::where([['title', 'like', "%{$query}%"],['status','=',1],['type','=','post']])
                ->orWhere('slug', 'like', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->get();
                break;
        }
         
        return view('frontend.search', compact('list_res','search_type'));
    }
}
