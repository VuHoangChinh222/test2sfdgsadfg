<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Requests\RegisterRequest;


class AuthController extends Controller
{
    public function getLogin()
    {
        return view("login");
    }
    public function doLogin(Request $request){
        $credentials=[
            'password' => $request->password,
            'status' =>1
        ];
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $credentials["email"]=$request->username;
        } else {
            $credentials["username"]=$request->username;
        }

        if (Auth::attempt($credentials)) {
            $user=Auth::user();
            if($user->status!=1){
                return redirect()->route('website.getLogin')->with("message","Unactivated account");
            }
            return redirect()->route('site.home');
        }
        else{
            return redirect()->route('website.getLogin')->with("message","Login failed");
        }
    }
    public function doLogout(){
        Auth::logout();
        return redirect()->route('site.home');
    }

    public function getRegister()
    {
        return view("register");
    }
    public function doRegister(RegisterRequest $request){
        if($request->password==$request->rePassword){
            $credentials=[
                'email' => $request->email,
                'username' => $request->username,
                'status' =>1
            ];
            //Kiểm tra tài khoản đã tồn tại chauw
            if (Auth::attempt($credentials)) {
                $user=Auth::user();
                if($user){
                    return redirect()->route('website.getRegister')->with("message","Username or email that already exists");
                }
            }
            else{
                $user=new User();
                $user->name=$request->name;
                $user->username= Str::of($request->username)->trim();
                $user->email=$request->email;
                $user->password=$request->password;
                $user->phone=$request->phone;
                $user->address=$request->address;
                $user->gender=$request->gender;
                $user->roles="customer";
                //Upload file
                if ($request->file('image')) {
                    $exten = $request->file("image")->extension();
                    if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                        $filename = $user->username . "." . $exten;
                        $request->image->move(public_path("images/users"), $filename);
                        $user->image = $filename;
                    }
                }
                $user->created_at=date('Y-m-d H:i:s');
                $user->status=1;
                $user->created_by=Auth::id() ?? 1; //Id của người quản trị

                // Lưu vào csdl
                $user->save();

                return view("login");
            }
        }else{
            return redirect()->route('website.getRegister')->with("message","Password and password confirmation must be the same");
        }
        
    }
}