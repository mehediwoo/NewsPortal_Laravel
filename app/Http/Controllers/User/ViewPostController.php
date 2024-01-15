<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ViewPostController extends Controller
{
    public function Index($id)
    {
        $post = Post::findOrFail($id);
        $related_post = Post::inRandomOrder()->where('cate_id',$post->cate_id)->limit(6)->get();
        $latest_news = Post::orderBy('id','DESC')->limit(10)->get();
        $popular_news = Post::inRandomOrder()->limit(10)->get();
        return view('user.view_post', compact('post','related_post','latest_news','popular_news'));
    }
}
