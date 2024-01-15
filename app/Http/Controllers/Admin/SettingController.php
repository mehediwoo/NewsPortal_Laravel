<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\social;
use App\Models\seo;
use App\Models\namaz;
use App\Models\liveTV;
use App\Models\notice;

class SettingController extends Controller
{
    public function social()
    {
        $data = social::first();
        return view('admin.setting.social.index',compact('data'));
    }
    public function socialUpdate(Request $request,$id)
    {
        $request->validate([
            'facebook' => 'url|nullable',
            'twitter' => 'url|nullable',
            'linkedin' => 'url|nullable',
            'instagram' => 'url|nullable',
            'youtube' => 'url|nullable',
        ]);

        $social = social::findOrFail($id);
        $social->facebook = $request->input('facebook');
        $social->twitter = $request->input('twitter');
        $social->linkdin = $request->input('linkedin');
        $social->instagram = $request->input('instagram');
        $social->youtube = $request->input('youtube');
        $result = $social->update();
        if($result){
            return redirect()->back()->with('success','Social media save successfully!');
        }else{
            return redirect()->back()->with('error','Something went wrong, please try again!');
        }
    }

    public function seo()
    {
        $seo = seo::first();
        return view('admin.setting.seo.index', compact('seo'));
    }

    public function seoUpdate(Request $request,$id)
    {
        $seo = seo::findOrFail($id);
        $seo->meta_author  = $request->input('meta_author');
        $seo->meta_title   = $request->input('meta_title');
        $seo->meta_keyword = $request->input('meta_keyword');
        $seo->meta_description = $request->input('meta_description');
        $seo->google_analytics = $request->input('google_analytics');
        $seo->google_verification = $request->input('google_verification');
        $seo->alexa_analytics = $request->input('alexa_analytics');
        $result = $seo->update();
        if($result){
            return redirect()->back()->with('success','SEO data save successfully!');
        }else{
            return redirect()->back()->with('error','Something went wrong, try again!');
        }
    }

    public function Namaz()
    {
        $namaz = namaz::first();
        return view('admin.setting.prayer.index',compact('namaz'));
    }

    public function namazUpdate(Request $request,$id)
    {
        $request->validate([
            'fazar'=> 'required',
            'johor'=> 'required',
            'asor'=> 'required',
            'magrib'=> 'required',
            'esa'=> 'required',
        ]);

        $namaz = namaz::findOrFail($id);
        $namaz->fazar = $request->input('fazar');
        $namaz->johor = $request->input('johor');
        $namaz->asor = $request->input('asor');
        $namaz->magrib = $request->input('magrib');
        $namaz->esa = $request->input('esa');
        $result = $namaz->update();
        if($namaz){
            return redirect()->back()->with('success','Prayer time save successfully!');
        }else{
            return redirect()->back()->with('error','Something went wrong, try again!');
        }
    }

    public function TV()
    {
        $tv = liveTV::first();
        return view('admin.setting.tv.index',compact('tv'));
    }
    public function TvUpdate(Request $request,$id)
    {
        $tv = liveTV::findOrFail($id);
        $tv->embed_code = $request->input('livetv');
        $result = $tv->update();
        if($result){
            return redirect()->back()->with('success','Live tv save successfully!');
        }else{
            return redirect()->back()->with('error','Something went wrong, try again!');
        }
    }
    public function TVstatus($id)
    {
        $status = liveTV::findOrFail($id);
        if($status->status == '0'){
            $status->status = '1';
            $status->update();
            return redirect()->back()->with('success','Live tv activated successfully!');
        }else{
            $status->status = '0';
            $status->update();
            return redirect()->back()->with('error','Live tv is deactivated Successfully!');
        }
    }

    public function Notice()
    {
        $notice = notice::first();
        return view('admin.setting.notice.index',compact('notice'));
    }
    public function NoticeUpdate(Request $request,$id)
    {
        $notice = notice::findOrFail($id);
        $notice->notice_bn = $request->input('notice_bn');
        $notice->notice_en = $request->input('notice_en');
        $result = $notice->update();
        if($result){
            return redirect()->back()->with('success','Notice save successfully!');
        }else{
            return redirect()->back()->with('error','Something went wrong, try again!');
        }
    }
    public function NoticeStatus($id)
    {
        $status = notice::findOrFail($id);
        if($status->status == '0'){
            $status->status = '1';
            $status->update();
            return redirect()->back()->with('success','Notice activated successfully!');
        }else{
            $status->status = '0';
            $status->update();
            return redirect()->back()->with('error','Notice deactivated Successfully!');
        }
    }

}
