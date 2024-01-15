<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\category;

class CategoryNewsController extends Controller
{
    public function CategoryNews($id)
    {
        $cate_name = category::where('id',$id)->first();
        $category_news = Post::orderBy('id','DESC')->where('cate_id',$id)->paginate(4);
        return view('user.category_post', compact('category_news','cate_name'));
    }

    public function countryPost()
    {
        $all_country = Post::orderBy('id','DESC')->where('dist_id','!=',null)->paginate(12);
        return view('user.country', compact('all_country'));
    }


}
