<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Post::where('status','!=',0)
            ->select("id","title","detail","status","image","type","slug","topic_id")
            ->orderBy('created_at','desc')
            ->get();
        //xử lý parent id, sort_order
        $htmltopicid="";
        foreach ($list as $row)
        {
            if($row->title){
                $htmltopicid .= "<option value= '" .$row->id ."'>" .$row->title ."</option>";
            }
        }
        return view("backend.post.index",compact("list", "htmltopicid"));
    }
    public function trash()
    {   
        $list = Post::where('status','=',0)
            ->select("id","title","detail","status","image","type","slug","topic_id","description")
            ->orderBy('created_at','desc')
            ->get();
        return view("backend.post.trash",compact("list")); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $posts = Post::all();

        $htmlpostid = "";
        $topic=Topic::all();
        foreach ($topic as $row) {
                $htmlpostid .= "<option value= '" .$row->id ."'>" .$row->name ."</option>";
        }

        return view("backend.post.create", compact("htmlpostid"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();

        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-');
        $post->detail = $request->detail;
        $post->description = $request->description;
        $post->topic_id = $request->topic_id;
        // $post->sort_order = $request->sort_order;
        //upload file
        if ($request->image) {
            $exten = $request->file("image")->extension(); //Lấy đuôi của file
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $post->slug . "." . $exten;
                $request->image->move(public_path("images/posts"), $filename);
                $post->image = $filename;
            }
        }
        //end upload file

        $post->status = $request->status;

        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = Auth::id() ?? 1;
        $post->save();
        //chuyển hướng trang
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        return view("backend.post.show",compact("post")); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $list = Topic::where('status','!=',0)
            ->select("id","name")
            ->orderBy('created_at','desc')
            ->get();
        //xử lý parent id, sort_order
        $htmltopicid="";
        foreach ($list as $row)
        {
            $htmltopicid .= "<option value= '" .$row->id ."'>" .$row->name ."</option>";
        }
        return view("backend.post.edit",compact("list", "htmltopicid","post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Tìm post cần cập nhật
        $post = Post::find($id);

        // Cập nhật dữ liệu
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->slug = Str::of($request->title)->slug('-');
        $post->description = $request->description;
        $post->topic_id = $request->topic_id;
        $post->type = $request->type;
        $post->status = $request->status;

        // Kiểm tra và cập nhật hình ảnh nếu có
        if ($request->image) {
            $exten = $request->file("image")->extension(); //Lấy đuôi của file
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $post->slug . "." . $exten;
                $request->image->move(public_path("images/posts"), $filename);
                $post->image = $filename;
            }
        }

        $post->save();

        // Điều hướng về trang danh sách với thông báo thành công
        return redirect()->route('admin.post.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if($post ==null)
        {
            return redirect()->route('admin.post.index');
        }
        $post->delete();
        //chuyển hướng trang
        return redirect()->route('admin.post.trash');
    }

    public function status(string $id)
    {
        $post = Post::find($id);
        if($post ==null)
        {
            return redirect()->route('admin.post.index');
        }

        $post->status = ($post->status==1)?2:1;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
        $post->save();
        //chuyển hướng trang
        return redirect()->route('admin.post.index');
    }

    public function restore(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }

        $post->status = 2;
        $post->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $post->updated_by = Auth::id() ?? 1;
        $post->save(); //lưu vào csdl
        return redirect()->route('admin.post.trash');
    }

    public function delete(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }

        $post->status = 0;
        $post->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $post->updated_by = Auth::id() ?? 1;
        $post->save(); //lưu vào csdl
        return redirect()->route('admin.post.index');
    }
}
