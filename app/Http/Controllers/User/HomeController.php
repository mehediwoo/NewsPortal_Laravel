<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Models\liveTV;
use App\Models\namaz;
use App\Models\Post;
use App\Models\category;
use App\Models\photo_gallery;
use App\Models\video_gallery;
use App\Models\facebook_page_model;
class HomeController extends Controller
{
    public function Home()
    {
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        $live_tv = liveTV::first();
        $namaz   = namaz::first();
        $first_section_big = Post::orderBy('id','DESC')->where('first_sec_thumbnail','on')->first();
        $first_section = Post::orderBy('id','DESC')->where('first_section','on')->limit(12)->get();

        if (category::all()->count() > 0 && Post::all()->count() > 0) {
            // Category
            $second_category ='';
            $third_category ='';
            $forth_category ='';
            $fifth_category ='';
            $sixth_category ='';
            $seventh_category ='';

            $second_cate_big_thumb_post ='';
            $second_cat_post ='';
            $third_cate_big_thumb_post ='';
            $third_cat_post ='';
            $forth_cate_big_thumb_post ='';
            $forth_cat_post ='';
            $fifth_cate_big_thumb_post ='';
            $fifth_cat_post ='';
            $sixth_cate_big_thumb_post ='';
            $sixth_cat_post ='';
            $seventh_cate_big_thumb_post ='';
            $seventh_cat_post_first ='';
            $seventh_cat_post_second ='';

                $first_category = category::first();
                $first_cate_big_thumb_post = Post::orderBy('id','DESC')->where('cate_id',$first_category->id)->where('big_thumbnail','on')->first();
                $first_cat_post = Post::orderBy('id','DESC')->where('cate_id',$first_category->id)->where('big_thumbnail',null)->limit(3)->get();
            if (category::skip(1)->first()==true) {
                $second_category = category::skip(1)->first();
                $second_cate_big_thumb_post = Post::orderBy('id','DESC')->where('cate_id',$second_category->id)->where('big_thumbnail','on')->first();
                $second_cat_post = Post::orderBy('id','DESC')->where('cate_id',$second_category->id)->where('big_thumbnail',null)->limit(3)->get();
            }elseif (category::skip(2)->first()) {
                $third_category = category::skip(2)->first();
                $third_cate_big_thumb_post = Post::orderBy('id','DESC')->where('cate_id',$third_category->id)->where('big_thumbnail','on')->first();
                $third_cat_post = Post::orderBy('id','DESC')->where('cate_id',$third_category->id)->where('big_thumbnail',null)->limit(3)->get();
            }elseif (category::skip(3)->first()==true) {
               $forth_category = category::skip(3)->first();
                $forth_cate_big_thumb_post = Post::orderBy('id','DESC')->where('cate_id',$forth_category->id)->where('big_thumbnail','on')->first();
                $forth_cat_post = Post::orderBy('id','DESC')->where('cate_id',$forth_category->id)->where('big_thumbnail',null)->limit(3)->get();
            }elseif (category::skip(4)->first()==true) {
                $fifth_category = category::skip(4)->first();
                $fifth_cate_big_thumb_post = Post::orderBy('id','DESC')->where('cate_id',$fifth_category->id)->where('big_thumbnail','on')->first();
                $fifth_cat_post = Post::orderBy('id','DESC')->where('cate_id',$fifth_category->id)->where('big_thumbnail',null)->limit(3)->get();
            }elseif (category::skip(5)->first()==true) {
                $sixth_category = category::skip(5)->first();
                $sixth_cate_big_thumb_post = Post::orderBy('id','DESC')->where('cate_id',$sixth_category->id)->where('big_thumbnail','on')->first();
                $sixth_cat_post = Post::orderBy('id','DESC')->where('cate_id',$sixth_category->id)->where('big_thumbnail',null)->limit(3)->get();
            }elseif (category::skip(6)->first()==true) {
                $seventh_category = category::skip(6)->first();
                $seventh_cate_big_thumb_post = Post::orderBy('id','DESC')->where('cate_id',$seventh_category->id)->where('big_thumbnail','on')->first();
                $seventh_cat_post_first = Post::orderBy('id','DESC')->where('cate_id',$seventh_category->id)->where('big_thumbnail',null)->limit(3)->get();
                $seventh_cat_post_second = Post::orderBy('id','DESC')->where('cate_id',$seventh_category->id)->where('big_thumbnail',null)->skip(3)->limit(3)->get();
            }


            $country = Post::orderBy('id','DESC')->where('dist_id',null)->first();
            if ($country==true) {
                $country_first_section = Post::orderBy('id','DESC')->where('dist_id','!=',null)->where('big_thumbnail',null)->limit(6)->get();
                $country_second_section = Post::orderBy('id','DESC')->where('dist_id','!=',null)->where('big_thumbnail',null)->skip(6)->limit(6)->get();
            }else{
                $country_first_section='';
                $country_second_section='';
            }


            $big_photo = photo_gallery::orderBy('id','DESC')->first();
            $small_photo = photo_gallery::orderBy('id','DESC')->skip(1)->limit(5)->get();

            $big_video = video_gallery::orderBy('id','DESC')->where('type',1)->first();
            $small_video = video_gallery::orderBy('id','DESC')->where('type','!=',1)->limit(3)->get();

            $latest_news = Post::orderBy('id','DESC')->limit(10)->get();
            $popular_news = Post::inRandomOrder()->limit(10)->get();

            $fbPage = facebook_page_model::first();

            return view('user.home', compact(
            'live_tv',
            'namaz',
            'first_section_big',
            'first_section',
            'first_category',
            'first_cate_big_thumb_post',
            'first_cat_post',
            'second_category',
            'second_cate_big_thumb_post',
            'second_cat_post',
            'third_category',
            'third_cate_big_thumb_post',
            'third_cat_post',
            'forth_category',
            'forth_cate_big_thumb_post',
            'forth_cat_post',
            'fifth_category',
            'fifth_cate_big_thumb_post',
            'fifth_cat_post',
            'sixth_category',
            'sixth_cate_big_thumb_post',
            'sixth_cat_post',
            'seventh_category',
            'seventh_cate_big_thumb_post',
            'seventh_cat_post_first',
            'seventh_cat_post_second',
            'country',
            'country_first_section',
            'country_second_section',
            'big_photo',
            'small_photo',
            'big_video',
            'small_video',
            'latest_news',
            'popular_news',
            'fbPage'
        ));

        }else{
            return view('user.layout.not_found');
        }
    }

    // Language Chaenge
    public function Language()
    {

        if(session()->get('lan')!='english'){
            session()->forget('bangla');
            session()->put('lan','english');
            return redirect()->back();
        }else{
            session()->forget('english');
            session()->put('lan','bangla');
            return redirect()->back();
        }
    }

    public function NotFound()
    {
        return view('user.layout.not_found');
    }
}
