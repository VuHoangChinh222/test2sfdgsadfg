<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Http\Requests\CreateContactRequest;

class ContactController extends Controller
{
    function index(){
        if(Auth::user()){
            $user=Auth::user();
            return view('frontend.contact',compact('user'));
        }else{
            return view('frontend.contact');
        }
    }

    function create(CreateContactRequest $request){
        $contact=new Contact();
        $user=Auth::user();
        
        $contact->title=$request->title;
        $contact->content=$request->content;

        $request->name?($contact->name=$request->name):($contact->name=$user->name);
        $request->email?($contact->email=$request->email):($contact->email=$user->email);
        $request->phone?($contact->phone=$request->phone):($contact->phone=$user->phone);
        
        $user?($contact->user_id=$user->id):"";

        $contact->save();
        return view('frontend.home');
    }
}
