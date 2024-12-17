<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Banner::where('status','!=',0)
        ->orderBy('created_at','desc')
        ->get();
        return view("backend.banner.index",compact('list'));
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
    public function store(StoreBannerRequest $request)
    {
        $banner = new banner();
 
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->position = $request->position  ;
        $banner->description = $request->description;
        //upload File
        if ($request->image) {
            $exten = $request->file("image")->extension(); //Lấy đuôi của file
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $banner->name . "." . $exten;
                $request->image->move(public_path("images/banners"), $filename);
                $banner->image = $filename;
            }
        }
        //end upload file
 
        $banner->status = $request->status;
   
        $banner->created_at = date('Y-m-d H:i:s');//ngày hệ thống
        $banner->created_by = Auth::id() ?? 1;  
        $banner->save();
       //chuyển hướng trang
       return redirect()->route('admin.banner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        return view("backend.banner.show", compact("banner"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        return view("backend.banner.edit", compact("banner"));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateBannerRequest $request, string $id)
    // {
    //       //Lấy thông tin và lưu vào CSDL
    //       $banner = Banner::find($id);
    //       if ($banner == null) {
    //           return redirect()->route('admin.banner.index');
    //       }
    //       $banner->name = $request->name;
    //       $banner->description = $request->description;

    //       //upload File
    //       if ($request->image) {
    //           $exten = $request->file("image")->extension(); //Lấy đuôi của file
    //           if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
    //               $filename = $banner->name . "." . $exten;
    //               $request->image->move(public_path("images/banners"), $filename);
    //               $banner->image = $filename;
    //           }
    //       }
    //       //end upload file
    //       $banner->status = $request->status;
    //       $banner->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
    //       $banner->updated_by = Auth::id() ?? 1;
  
    //       $banner->save(); //lưu vào csdl
  
    //       //chuyển hướng trang
    //       return redirect()->route('admin.banner.index');
    // }

    public function update(UpdateBannerRequest $request, string $id)
    {
          //Lấy thông tin và lưu vào CSDL
          $banner = Banner::find($id);
          if ($banner == null) {
              return redirect()->route('admin.banner.index');
          }
          $banner->name = $request->name;
          $banner->description = $request->description;
          //upload File
          if ($request->image) {
              $exten = $request->file("image")->extension(); //Lấy đuôi của file
              if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                  $filename = $banner->name . "." . $exten;
                  $request->image->move(public_path("images/banners"), $filename);
                  $banner->image = $filename;
              }
          }
          //end upload file
  
  
          $banner->status = $request->status;
  
          $banner->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
          $banner->updated_by = Auth::id() ?? 1;
  
          $banner->save(); //lưu vào csdl
  
          //chuyển hướng trang
          return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->delete(); //Xóa khỏi csdl
        //chuyển hướng trang
        return redirect()->route('admin.banner.trash');
    }
    public function status(string $id)
    {
        //
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->status = ($banner->status == 1) ? 2 : 1;
        $banner->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save(); //lưu vào csdl
        return redirect()->route('admin.banner.index');
    }
    public function delete(string $id)
    {
        //
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.brand.index');
        }
        $banner->status = 0;
        $banner->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save(); //lưu vào csdl
        return redirect()->route('admin.banner.index');
    }
    public function trash()
    {
        $list = Banner::where('status','==',0)
        ->orderBy('created_at','desc')
        ->get();
  
        return view("backend.banner.trash", compact("list"));
    }
    public function restore(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->status = 2;
        $banner->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save(); //lưu vào csdl
        return redirect()->route('admin.banner.trash');
    }
}
