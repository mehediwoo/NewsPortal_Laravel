<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\SubCategory;

class SubCategoryNewsController extends Controller
{
    public function SubCategoryNews($id)
    {
        $post = Post::orderBy('id','DESC')->where('subcate_id',$id)->paginate(15);
        $cate_subcat = SubCategory::where('id',$id)->first();
        if($post->count() > 0){
            return view('user.sub_cat_post', compact('post','cate_subcat'));
        }else{
            return redirect()->route('not.found');
        }

    }
}
