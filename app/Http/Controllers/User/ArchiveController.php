<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ArchiveController extends Controller
{
    public function Search(Request $request)
    {
        $form = $request->input('from');
        $to = $request->input('to');
        $post  = Post::whereBetween('created_at', [$form, $to])->paginate(12);
        return view('user.search',compact('post'));
    }
}
