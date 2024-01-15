<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\page;

class DinamicPageController extends Controller
{
    public function Index($slug)
    {
        $data = page::where('slug',$slug)->first();
        if($data==true){
            return view('user.page', compact('data'));
        }else{
            return redirect()->route('not.found');
        }

    }
}
