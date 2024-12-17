<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Brand::where('status', '!=', 0)
            ->select("id", "name", "image", "description", "sort_order", "slug", "status")
            ->orderBy('created_at', 'desc')
            ->get();
        //Xử lý parent_id, sort_order
        $htmlparenid = "";
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau: " . $row->name . "</option>";
        }
        return view("backend.brand.index", compact("list", "htmlparenid", "htmlsortorder"));
    }

    public function trash()
    {
        $list = Brand::where('status', '=', 0)
            ->select("id", "name", "image", "description", "sort_order", "slug", "status")
            ->orderBy('created_at', 'desc')
            ->get();
        return view("backend.brand.trash", compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        //
        //Lấy thông tin và lưu vào CSDL
        $brand = new Brand();

        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;
        
        //upload File
        if ($request->image) {
            $exten = $request->file("image")->extension(); //Lấy đuôi của file
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $brand->slug . "." . $exten;
                $request->image->move(public_path("images/brands"), $filename);
                $brand->image = $filename;
            }
        }
        //end upload file


        $brand->status = $request->status;

        $brand->created_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $brand->created_by = Auth::id() ?? 1;

        $brand->save(); //lưu vào csdl
        //chuyển hướng trang
        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        return view("backend.brand.show", compact("brand"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $list = Brand::where('status', '!=', 0)
            ->select("id", "name", "description", "status", "sort_order")
            ->orderBy('created_at', 'desc')
            ->get();
        //Xử lý parent_id, sort_order
        $htmlparenid = "";
        $htmlsortorder = "";
        foreach ($list as $row) {
            if ($brand->sort_order - 1 == $row->sort_order) {
                $htmlsortorder .= "<option selected value='" . ($row->sort_order + 1) . "'>Sau: " . $row->name . "</option>";
            } else {
                $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau: " . $row->name . "</option>";
            }
        }
        return view("backend.brand.edit", compact("list", "htmlparenid", "htmlsortorder", "brand"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, string $id)
    {
        //
        //Lấy thông tin và lưu vào CSDL
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;
        //upload File
        if ($request->image) {
            $exten = $request->file("image")->extension(); //Lấy đuôi của file
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $brand->slug . "." . $exten;

                $request->image->move(public_path("images/brands"), $filename);
                $brand->image = $filename;
                // 
            }
        }
        //end upload file


        $brand->status = $request->status;

        $brand->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $brand->updated_by = Auth::id() ?? 1;

        $brand->save(); //lưu vào csdl
        //chuyển hướng trang
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->delete(); //Xóa khỏi csdl
        //chuyển hướng trang
        return redirect()->route('admin.brand.trash');
    }

    //status
    public function status(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->status = ($brand->status == 1) ? 2 : 1;
        $brand->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $brand->updated_by = Auth::id() ?? 1;
        $brand->save(); //lưu vào csdl
        return redirect()->route('admin.brand.index');
    }
    //delete
    public function delete(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->status = 0;
        $brand->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $brand->updated_by = Auth::id() ?? 1;
        $brand->save(); //lưu vào csdl
        return redirect()->route('admin.brand.index');
    }
    //retore
    public function restore(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->status = 2;
        $brand->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $brand->updated_by = Auth::id() ?? 1;
        $brand->save(); //lưu vào csdl
        return redirect()->route('admin.brand.trash');
    }
}
