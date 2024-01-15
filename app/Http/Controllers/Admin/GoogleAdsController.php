<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\google_adds;

class GoogleAdsController extends Controller
{
    public function Index()
    {
        $ads = google_adds::orderBy('id','DESC')->get();
        return view('admin.setting.google_ads.index', compact('ads'));
    }

    public function Store(Request $request)
    {
        $request->validate([
            'ads_title'=>'required',
            'code_snippet'=>'required',
            'ads_type'=>'required',
        ]);

        $ads = new google_adds;
        $ads->title = $request->input('ads_title');
        $ads->google_code_snppit = $request->input('code_snippet');
        $ads->type = $request->input('ads_type');
        $result = $ads->save();
        if($result){
            return redirect()->route('google.ads')->with('success','Google ads created Successfully!');
        }else{
            return redirect()->route('google.ads')->with('error','Something went wrong, please try again!');
        }
    }
}
