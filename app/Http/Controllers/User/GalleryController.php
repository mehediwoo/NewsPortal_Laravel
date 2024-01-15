<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\photo_gallery;
use App\Models\video_gallery;

class GalleryController extends Controller
{
    public function PhotoGallery()
    {
        $photo = photo_gallery::orderBy('id','DESC')->paginate(15);
        return view('user.photo', compact('photo'));
    }

    public function VideoGallery()
    {
        $video = video_gallery::orderBy('id','DESC')->where('type',0)->paginate(15);
        return view('user.video', compact('video'));
    }
}
