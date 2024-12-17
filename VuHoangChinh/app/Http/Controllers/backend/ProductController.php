<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Product::where("product.status", "!=", 0)
            ->Join("category", "product.category_id", "=", "category.id")
            ->Join("brand", "product.brand_id", "=", "brand.id")
            ->select("product.id", "product.name", "product.slug", "product.image", "product.status", "category.name as categoryname", "brand.name as brandname", "product.brand_id", "product.pricesale", "product.description", "product.category_id", "product.price")
            ->orderBy("product.created_at", "desc")
            ->get();
        return view("backend.product.index", compact("list"));
    }

    public function trash()
    {
        $list = Product::where("product.status", "=", 0)
            ->Join("category", "product.category_id", "=", "category.id")
            ->Join("brand", "product.brand_id", "=", "brand.id")
            ->select("product.id", "product.name", "product.slug", "product.image", "product.status", "category.name as categoryname", "brand.name as brandname", "product.brand_id", "product.pricesale", "product.description", "product.category_id", "product.price")
            ->orderBy("product.created_at", "desc")
            ->get();
        return view("backend.product.trash", compact("list"));
    }
    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
        $categories = Category::all();
        $brands = Brand::all();

        $htmlcategoryid = "";
        $htmlbrandid = "";

        foreach ($categories as $category) {
            $htmlcategoryid .= "<option value='" . $category->id . "'>" . $category->name . "</option>";
        }

        foreach ($brands as $brand) {
            $htmlbrandid .= "<option value='" . $brand->id . "'>" . $brand->name . "</option>";
        }

        return view("backend.product.create", compact("htmlcategoryid", "htmlbrandid"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
        //Lấy thông tin và lưu vào CSDL
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->brand_id = $request->brand_id;
        $product->detail = $request->detail;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        //upload File
        if ($request->image) {
            $exten = $request->file("image")->extension(); //Lấy đuôi của file
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $product->slug . "." . $exten;
                $request->image->move(public_path("images/products"), $filename);
                $product->image = $filename;
            }
        }
        //end upload file


        $product->status = $request->status;

        $product->created_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $product->created_by = Auth::id() ?? 1;

        $product->save(); //lưu vào csdl

        //chuyển hướng trang
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        return view("backend.product.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        //Lấy thông tin và lưu vào CSDL
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $list = Product::where("product.status", "!=", 0)
            ->Join("category", "product.category_id", "=", "category.id")
            ->Join("brand", "product.brand_id", "=", "brand.id")
            ->select("product.id", "product.name", "category.name as categoryname", "brand.name as brandname", "product.brand_id", "product.pricesale", "product.description", "product.category_id", "product.price")
            ->orderBy("product.created_at", "desc")
            ->get();

        $categories = Category::all();
        $brands = Brand::all();

        $htmlcategoryid = "";
        $htmlbrandid = "";

        foreach ($categories as $category) {
            if ($product->category_id == $category->id) {
                $htmlcategoryid .= "<option selected value='" . $category->id . "'>" . $category->name . "</option>";
            } else {
                $htmlcategoryid .= "<option value='" . $category->id . "'>" . $category->name . "</option>";
            }
        }

        foreach ($brands as $brand) {
            if ($product->brand_id == $brand->id) {
                $htmlbrandid .= "<option selected value='" . $brand->id . "'>" . $brand->name . "</option>";
            } else {
                $htmlbrandid .= "<option value='" . $brand->id . "'>" . $brand->name . "</option>";
            }
        }

        return view("backend.product.edit", compact("htmlcategoryid", "htmlbrandid", "product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        //
        //Lấy thông tin và lưu vào CSDL
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->brand_id = $request->brand_id;
        $product->detail = $request->detail;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        //upload File
        if ($request->image) {
            $exten = $request->file("image")->extension(); //Lấy đuôi của file
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $product->slug . "." . $exten;
                $request->image->move(public_path("images/products"), $filename);
                $product->image = $filename;
            }
        }
        //end upload file


        $product->status = $request->status;

        $product->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $product->updated_by = Auth::id() ?? 1;

        $product->save(); //lưu vào csdl

        //chuyển hướng trang
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    //xóa khỏi csdl
    public function destroy(string $id)
    {

        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->delete(); //Xóa khỏi csdl
        //chuyển hướng trang
        return redirect()->route('admin.product.trash');
    }
    //status
    public function status(string $id)
    {
        //
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.brand.index');
        }
        $product->status = ($product->status == 1) ? 2 : 1;
        $product->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $product->updated_by = Auth::id() ?? 1;
        $product->save(); //lưu vào csdl
        return redirect()->route('admin.product.index');
    }
    //Xóa vào thùng rác
    public function delete(string $id)
    {
        //
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.brand.index');
        }
        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $product->updated_by = Auth::id() ?? 1;
        $product->save(); //lưu vào csdl
        return redirect()->route('admin.product.index');
    }
    public function restore(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $product->updated_by = Auth::id() ?? 1;
        $product->save(); //lưu vào csdl
        return redirect()->route('admin.product.trash');
    }
}
