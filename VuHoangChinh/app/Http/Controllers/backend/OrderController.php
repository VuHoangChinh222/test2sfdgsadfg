<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateOrderRequest;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list=Order::where('order.status','!=','0')
        // ->rightJoin('user', 'order.user_id', '=', 'user.id')
        ->select("order.id","delivery_name","delivery_phone","delivery_email","order.created_at","status")
        ->orderBy('order.created_at','desc')
        ->get();
        return view("backend.order.index",compact('list'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $listProductId=OrderDetail::where('order_id','=',$order->id)
        ->get();
        
        return view("backend.order.show", compact("order"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, string $id)
    {
    }

    public function trash()
    {
        $list = Order::where('status', '=', 0)
            ->orderBy('created_at', 'desc')
            ->get();
        return view("backend.order.trash", compact("list"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->delete(); //Xóa khỏi csdl
        //chuyển hướng trang
        return redirect()->route('admin.order.trash');
    }

    public function status(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->status = ($order->status == 1) ? 2 : 1;
        $order->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $order->updated_by = Auth::id() ?? 1;
        $order->save(); //lưu vào csdl
        return redirect()->route('admin.order.index');
    }
    //delete
    public function delete(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->status = 0;
        $order->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $order->updated_by = Auth::id() ?? 1;
        $order->save(); //lưu vào csdl
        return redirect()->route('admin.order.index');
    }
    //retore
    public function restore(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->status = 2;
        $order->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $order->updated_by = Auth::id() ?? 1;
        $order->save(); //lưu vào csdl
        return redirect()->route('admin.order.trash');
    }
}
