<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Http\Requests\StoreTopicRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateTopicRequest;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Topic::where('status','!=',0)
        ->orderBy('created_at','desc')
        ->get();
        
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='".($row->sort_order + 1)."'>Sau:".
            $row->name."</option>";
            }
        return view("backend.topic.index",compact('list','htmlsortorder'));
    }
    public function trash()
    {
        $list = Topic::where('status','=',0)
        ->orderBy('created_at','desc')
        ->get();
        return view("backend.topic.trash",compact('list'));
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
    public function store(StoreTopicRequest $request)
    {
            //Lấy thông tin và lưu vào CSDL
            $topic = new topic();
 
            $topic->name = $request->name;
            $topic->description = $request->description;
         
            $topic->slug =Str::of($request->name)->slug('-') ;
            $topic->sort_order = $request->sort_order;

            $topic->status = $request->status;
       
            $topic->created_at = $request->date('Y-m-d H:i:s');//ngày hệ thống
            $topic->created_by = Auth::id() ?? 1;  
           $topic->save();
           //chuyển hướng trang
           return redirect()->route('admin.topic.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $topic=Topic::find($id);
        if($topic==null){
            return redirect()->route('admin.topic.index');
        }
        return view("backend.topic.show",compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null){
            return redirect()->route('admin.topic.index');
        }
        $list = Topic::where('status','!=',0)
        ->orderBy('created_at','desc')
        ->select('id','name','sort_order','slug','status')
        ->get();
        
        $htmlsortorder = "";
        foreach ($list as $row) {
            if($topic->sort_order-1 ==$row->sort_order){
                $htmlsortorder .= "<option selected value='".($row->sort_order + 1)."'>Sau:".$row->name."</option>";
            }else{
                $htmlsortorder .= "<option value='".($row->sort_order + 1)."'>Sau:".$row->name."</option>";
            }
           
            }
        return view("backend.topic.edit",compact('list','htmlsortorder','topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, string $id)
    {
       
            //Lấy thông tin và lưu vào CSDL
            $topic=Topic::find($id);
            if($topic==null){
                return redirect()->route('admin.topic.index');
            }
 
            $topic->name = $request->name;
            $topic->description = $request->description;
         
            $topic->slug =Str::of($request->name)->slug('-') ;
            $topic->sort_order = $request->sort_order;

            $topic->status = $request->status;
       
            $topic->updated_at = $request->date('Y-m-d H:i:s');//ngày hệ thống
            $topic->updated_by = Auth::id() ?? 1;  
           $topic->save();
           //chuyển hướng trang
           return redirect()->route('admin.topic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic = Topic::find($id);
        if($topic == null){
            return redirect()->route('admin.topc.index');
        }
        $topic->delete();
        return redirect()->route('admin.topic.trash');
    }
    public function status(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null){
            return redirect()->route('admin.topic.index');
        }
        $topic->status=($topic->status==1) ? 2 : 1;
        $topic->updated_at = date('Y-m-d H:i:s');//ngày hệ thống
        $topic->updated_by = Auth::id() ?? 1;  
       $topic->save();
       //chuyển hướng trang
       return redirect()->route('admin.topic.index');
    }
    public function delete(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null){
            return redirect()->route('admin.topic.index');
        }
        $topic->status=0;
        $topic->updated_at =date('Y-m-d H:i:s');//ngày hệ thống
        $topic->updated_by = Auth::id() ?? 1;  
       $topic->save();
       //chuyển hướng trang
       return redirect()->route('admin.topic.index');
    }
    public function restore(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null){
            return redirect()->route('admin.topic.index');
        }
        $topic->status=2;
        $topic->updated_at = date('Y-m-d H:i:s');//ngày hệ thống
        $topic->updated_by = Auth::id() ?? 1;  
       $topic->save();
       //chuyển hướng trang
       return redirect()->route('admin.topic.trash');
    }
}
