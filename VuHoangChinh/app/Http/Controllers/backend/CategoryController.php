<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
// use Illuminate\Http\FileHelpers;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $mang=[
        //     ['status','>',1],
        //     ['id','>',1]
        // ];

        $list=Category::where('status','!=','0')
        ->select("id","name","image","status","slug")
        ->orderBy('created_at','desc')
        ->get();
        // var_dump($list);


        // Xử lý parent_id, sort_order
        $htmlparentid="";
        $htmlsortorder="";
        foreach($list as $row){
            $htmlparentid .="<option value='".$row->id."'>".$row->name."</option>";
            $htmlsortorder .="<option value='".($row->sort_order+1)."'>Sau: ".$row->name."</option>";
        }

        return view("backend.category.index",compact("list","htmlparentid","htmlsortorder"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        var_dump("dasds");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // Lấy dữ liệu từ form
        // Lấy thông tin và lưu vào csdl
        $category = new Category();

        // Tên trường || tên của thẻ input name  
        $category->name=$request->name;
        $category->slug=Str::of($request->name)->slug('-');
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;
        $category->sort_order=$request->sort_order;
        $category->status=$request->status;

        //Upload file
        if ($request->image) {
            $exten = $request->file("image")->extension(); //Lấy đuôi của file
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $category->slug . "." . $exten;
                $request->image->move(public_path("images/categories"), $filename);
                $category->image = $filename;
            }
        }
    
        $category->created_at=date('Y-m-d H:i:s');
        $category->created_by=Auth::id() ?? 1; //Id của người quản trị
    

        // Lưu vào csdl
        $category->save();

        // Xử lý
        // Chuyển hướng trang
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category=Category::find($id);
        if($category==NULL)
            return redirect()->route('admin.category.index');
        return view('backend.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::find($id);
        if($category==NULL)
            return redirect()->route('backend.category.index');
        $list=Category::where('status','!=','0')
        ->select("id","name","sort_order")
        ->orderBy('created_at','desc')
        ->get();

        $htmlparentid="";
        $htmlsortorder="";
        foreach($list as $row){
            if($category->parent_id==$row->id)
                $htmlparentid .="<option selected value='".$row->id."'>".$row->name."</option>";
            else
                $htmlparentid .="<option value='".$row->id."'>".$row->name."</option>";

            if($category->sort_order-1 ==$row->sort_order)
                $htmlsortorder .="<option selected value='".($row->sort_order+1)."'>Sau: ".$row->name."</option>";
            else
                $htmlsortorder .="<option value='".($row->sort_order+1)."'>Sau: ".$row->name."</option>";

        }

        return view("backend.category.edit",compact("list","htmlparentid","htmlsortorder","category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category=Category::find($id);
        if($category==NULL)
            return redirect()->route('admin.category.index');

        $category->name=$request->name;
        $category->slug=Str::of($request->name)->slug('-');
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;
        $category->sort_order=$request->sort_order;
        $category->status=$request->status;

        //Upload file
        if($request->image){
            $exten = $request->file("image")->extension(); 
            //Lấy đuôi file
            if(in_array($exten,["png", "jpg", "jpeg", "gif", "webp"])){
                $filename=$category->slug.".".$exten;
                $request->image->move(public_path("images/categories"),$filename);
                $category->image=$filename;
            }
        }
    
        $category->updated_at=date('Y-m-d H:i:s');
        $category->updated_by=Auth::id() ?? 1; //Id của người quản trị
    

        // Lưu vào csdl
        $category->save();

        // Xử lý
        // Chuyển hướng trang
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        //
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->delete(); //Xóa khỏi csdl
        //chuyển hướng trang
        return redirect()->route('admin.category.trash');
    }
    //delete
    public function delete(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->status = 0;
        $category->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $category->updated_by = Auth::id() ?? 1;
        $category->save(); //lưu vào csdl
        return redirect()->route('admin.category.index');
    }
    //retore
    public function restore(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->status = 2;
        $category->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $category->updated_by = Auth::id() ?? 1;
        $category->save(); //lưu vào csdl
        return redirect()->route('admin.category.trash');
    }

    public function trash()
    {
        $list = category::where('status', '=', 0)
            ->select("id", "name", "image", "slug", "status")
            ->orderBy('created_at', 'desc')
            ->get();
        return view("backend.category.trash", compact("list"));
    }

    public function status(string $id)
    {
        $category=Category::find($id);
        if($category==NULL)
            return redirect()->route('admin.category.index');
        if($category->status==1){
            $category->status=2;
        }else{
            $category->status=1;
        }
        $category->save();
        // Xử lý
        // Chuyển hướng trang
        return redirect()->route('admin.category.index');
    }
}
