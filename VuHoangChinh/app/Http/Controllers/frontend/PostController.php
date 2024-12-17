<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;

class PostController extends Controller
{
    function index($slug){
        if($slug=='*'){
            $list_post = Post::where([['status', '=',1],['type', '=','post']])
            ->orderBy('created_at', 'desc')
            ->paginate(9);
            return view('frontend.post', compact('list_post','slug'));
        }else{
            $list_post = Post::where([['post.status', '=',1],['topic.slug','=',$slug],['type','=','post']])
            ->join('topic', 'topic.id', '=', 'post.topic_id')
            ->select("post.slug as slug","post.title as title","post.image as image","post.description as description","topic.name as topicName")
            ->orderBy('post.created_at', 'desc')
            ->paginate(9);
            $nameTopic =Topic::where([['status', '=',1],['slug','=',$slug]])
            ->select('name')
            ->first();
            if($nameTopic){
                return view('frontend.post', compact('list_post','slug','nameTopic'));
            }else{
                return redirect()->route('site.home');
            }
        }
    }

    function detail($slug){
        $postData = Post:: where([['slug', '=', $slug], ['status', '=',1],['type', '=','post']])
        ->first();
        if($postData){
            $topicData=Topic::where([['status', '=',1],['id','=',$postData->topic_id]])
            ->first();
            $listPost=Post::where([['status', '=',1],['topic_id', '=',$postData->topic_id],['id', '!=',$postData->id]])
            ->orderBy('created_at','DESC')
            ->limit(4)
            ->get();
            return view('frontend.post_detail', compact('postData','topicData','listPost'));
        }else{
            return redirect()->route('site.home');
        }
    }

    function page($slug){
        $pageData = Post::where([['post.status', '=',1],['slug','=',$slug],['type','=','page']])
        ->first();
        if($pageData){
            return view('frontend.page', compact('pageData'));
        }else{
            return redirect()->route('site.home');
        }
    }

}
