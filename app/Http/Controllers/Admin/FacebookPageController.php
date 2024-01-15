<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\facebook_page_model;

class FacebookPageController extends Controller
{
    public function Index()
    {
        $page = facebook_page_model::first();
        return view('admin.setting.facebookpage.page', compact('page'));
    }

    public function PageUpdate(Request $request,$id)
    {
        $page = facebook_page_model::findOrFail($id);
        $page->page_title = $request->input('page_title');
        $page->page_url = $request->input('page_url');
        $result = $page->update();
        if($result){
            return redirect()->back()->with('success','Facebook page save successfully!');
        }else{
            return redirect()->back()->with('error','Something went wrong, try again!');
        }
    }

    public function PageStatus($id)
    {
        $status = facebook_page_model::findOrFail($id);
        if($status->status == '0'){
            $status->status = '1';
            $status->update();
            return redirect()->back()->with('success','Page activated successfully!');
        }else{
            $status->status = '0';
            $status->update();
            return redirect()->back()->with('success','Page is deactivated Successfully!');
        }
    }
}
