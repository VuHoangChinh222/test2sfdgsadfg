<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = User::where('user.status','!=',0)
            // ->join('user', 'user.user_id', '=', 'user.id')
            // ->join('brand', 'user.brand_id', '=', 'brand.id')
            // ->select('user.id','user.name','user.image','user.status','user.name as categoryname','brand.name as brandname')
            ->orderby('user.created_at','desc')
            ->get();
        return view("backend.user.index",compact('list'));
    }

    public function trash()
    {
        $list = User::where('user.status','==',0)
            ->select('id','name','image','status')
            ->orderby('user.created_at','desc')
            ->get();
        return view("backend.user.trash",compact('list'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = User::where('user.status','!=',0)
        ->orderby('user.created_at','desc')
        ->get();
    return view("backend.user.create",compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {        
        if($request->password_re == $request->password){
            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->password = $request->password;
            $user->username =Str::of($request->username)->trim();
            $user->roles = $request->roles;
            $user->status = $request->status;
            $user->created_at = date('Y-m-d H:i:s');
            $user->created_by = Auth::id()??1;
            $user->save();
            return redirect()->route('admin.user.index');
        }else{
            return redirect()->route('admin.user.create')->with("message","Password and password confirmation must be the same");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if($user == null){
            return redirect()->route('admin.user.index');
        }
        $list = User::where('user.status','!=',0)->where('id','=',$id)
        ->select('user.id','user.name','user.image','user.status','user.address','user.email','user.phone','user.username','user.roles','user.gender')
        ->orderby('user.created_at','desc')
        ->get();
        return view("backend.user.show",compact('list','user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::find($id);
        if($user==null)
        {
            return redirect()->route('admin.user.index');
        }
        $list = User::where('user.status','!=', 0)
        // ->select("id","name","username","phone","email")
        ->orderBy('user.created_at','desc')
        ->get();
        return view("backend.user.edit", compact('list','user'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if($user==null)
        {
            return redirect()->route('admin.user.index');
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->username = $request->username;
        if($user->password_re === $user->password){
        $user->password = $request->password;
        }
        $user->roles = $request->roles;
        $user->status = $request->status;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id()??1;
        $user->save();
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if($user == null){
            return redirect()->route('admin.user.index');
        }
        $user->delete();
        return redirect()->route('admin.user.trash');
    }
    public function delete(string $id)
    {
        $user = User::find($id);
        if($user == null){
            return redirect()->route('admin.user.index');
        }
        $user->status = 0;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id()??1;
        $user->save();
        return redirect()->route('admin.user.index');
    }
    public function status(string $id)
    {
        $user = User::find($id);
        if($user == null){
            return redirect()->route('admin.user.index');
        }
        $user->status = ($user->status ==1)?2:1;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id()??1;
        $user->save();
        return redirect()->route('admin.user.index');
    }
    public function restore(string $id)
    {
        $user = User::find($id);
        if($user == null){
            return redirect()->route('admin.user.index');
        }
        $user->status = 2;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id()??1;
        $user->save();
        return redirect()->route('admin.user.trash');
    }
}
