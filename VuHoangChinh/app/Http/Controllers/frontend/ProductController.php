<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    function index(){

        $list_product = Product::where('status', '=',1)
        ->orderBy('created_at', 'desc')
        ->paginate(9);

        $haveLink=true;

        return view('frontend.product', compact('list_product','haveLink'));
    }

    function getlistcategoryid($rowid){
        $listcatid=[];
        array_push($listcatid, $rowid);
        $list1 = Category::where([['parent_id','=',$rowid], ['status','=' ,1]])->select("id")->get();
        if (count($list1)>0)
        {
            foreach($list1 as $row1)
            {
                array_push($listcatid, $row1->id);
                $list2 = Category::where([['parent_id', '=', $row1->id], ['status','=',1]])->select("id")->get();
                if(count($list2)>0){
                    foreach($list2 as $row2)
                    {
                        array_push($listcatid, $row2->id);
                    }
                }
            }
        }
        return $listcatid; 
    }

    function category($slug){
        $row = Category:: where([['slug', '=', $slug], ['status', '=',1]]) ->select("id","name","slug")->first();
        if($row!=null){
            $listcatid=$this->getlistcategoryid($row->id);
        }

        $haveLink=true;

        $list_product = Product::where('status', '=',1)
        ->whereIn('category_id', $listcatid)
        ->orderBy('created_at', 'desc')
        ->paginate(9);

     
        return view('frontend.product_category', compact('list_product','row','haveLink'));
    }

    function detail($slug){
        $productData=Product::where([['status','=',1],['slug','=',$slug]])
        ->first();
        $listcatid = $this->getlistcategoryid($productData->category_id);
        $list_product = Product::where([['status', '=',1],['id','!=',$productData->id]])
        ->whereIn('category_id',$listcatid)
        ->orderBy('created_at','desc')
        ->limit (4)
        ->get();
        return view('frontend.product_detail',compact('productData','list_product'));
    }

    public function search(Request $request)
    {
        $list_product = Product::where('status', '=',1)
        ->orderBy('created_at', 'desc')
        ->paginate(9);

        $query = $request->input('query');

        $list_product = Product::where([['name', 'like', "%{$query}%"],['status','=',1]])
            ->orWhere([['description', 'like', "%{$query}%"],['slug', 'like', "%{$query}%"]])
            ->orderBy('created_at', 'desc')
            ->paginate(9);
            
        $haveLink=true;

        return view('frontend.product', compact('list_product','haveLink'));
    }

    public function brand($slug)
    {
        $brandId=Brand::where([['status','=',1],['slug','=',$slug]])
        ->first();
        $list_product = Product::where([['status','=',1],['brand_id','=',$brandId->id]])
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        $haveLink=true;

        if(isset($list_product))
            return view('frontend.product_brand', compact('list_product','brandId','haveLink'));
        else    
            return view('frontend.home');
    }

    public function filter(Request $request)
    {

        $filter=[
            ['status','=',1],
        ];


        //Dùng get thay vì page vì khi qua trang thì sẽ ko lưu giá trị của form
        switch ($request->sort) {
            case 'name-ASC':
                $list_product = Product::where($filter)
                ->orderBy('name','ASC')
                ->get();
                break;
            case 'name-DESC':
                $list_product = Product::where($filter)
                ->orderBy('name','DESC')
                ->get();
                break;
            case 'price-ASC':
                $list_product = Product::where($filter)
                ->orderBy('price','ASC')
                ->get();
                break;
            case 'price-DESC':
                $list_product = Product::where($filter)
                ->orderBy('price','DESC')
                ->get();
                break;
            default:
                $list_product = Product::where($filter)
                ->orderBy('created_at','DESC')
                ->get();
                break;
        }

        $haveLink=false;
        if(isset($list_product))
            return view('frontend.product', compact('list_product','haveLink'));
        else    
            return view('frontend.home');
    }

    public function brandFilter(Request $request,$slug)
    {
        $brandId=Brand::where([['status','=',1],['slug','=',$slug]])
        ->first();
        $filter=[
            ['status','=',1],
            ['brand_id','=',$brandId->id]
        ];

        //Dùng get thay vì page vì khi qua trang thì sẽ ko lưu giá trị của form
        switch ($request->sort) {
            case 'name-ASC':
                $list_product = Product::where($filter)
                ->orderBy('name','ASC')
                ->get();
                break;
            case 'name-DESC':
                $list_product = Product::where($filter)
                ->orderBy('name','DESC')
                ->get();
                break;
            case 'price-ASC':
                $list_product = Product::where($filter)
                ->orderBy('price','ASC')
                ->get();
                break;
            case 'price-DESC':
                $list_product = Product::where($filter)
                ->orderBy('price','DESC')
                ->get();
                break;
            default:
                $list_product = Product::where($filter)
                ->orderBy('created_at','DESC')
                ->get();
                break;
        }

        $haveLink=false;
        if(isset($list_product)){
            return view('frontend.product_brand', compact('list_product','haveLink','brandId'));
        }
        else    
            return view('frontend.home');
    }
    public function categoryFilter(Request $request,$slug)
    {
        $row = Category:: where([['slug', '=', $slug], ['status', '=',1]]) ->select("id","name","slug")->first();
        if($row!=null){
            $listcatid=$this->getlistcategoryid($row->id);
        }

        $filter=[
            ['status','=',1],
        ];


        //Dùng get thay vì page vì khi qua trang thì sẽ ko lưu giá trị của form
        switch ($request->sort) {
            case 'name-ASC':
                $list_product = Product::where($filter)
                ->whereIn('category_id', $listcatid)
                ->orderBy('name','ASC')
                ->get();
                break;
            case 'name-DESC':
                $list_product = Product::where($filter)
                ->whereIn('category_id', $listcatid)
                ->orderBy('name','DESC')
                ->get();
                break;
            case 'price-ASC':
                $list_product = Product::where($filter)
                ->whereIn('category_id', $listcatid)
                ->orderBy('price','ASC')
                ->get();
                break;
            case 'price-DESC':
                $list_product = Product::where($filter)
                ->whereIn('category_id', $listcatid)
                ->orderBy('price','DESC')
                ->get();
                break;
            default:
                $list_product = Product::where($filter)
                ->whereIn('category_id', $listcatid)
                ->orderBy('created_at','DESC')
                ->get();
                break;
        }

        $haveLink=false;
        if(isset($list_product))
            return view('frontend.product_category', compact('list_product','haveLink','row'));
        else    
            return view('frontend.home');
    }
}

