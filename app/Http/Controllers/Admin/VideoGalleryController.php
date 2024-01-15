<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\video_gallery;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $video = video_gallery::orderBy('id','DESC')->get();
        return view('admin.gallery.video.index', compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'title_bn' => 'required',
            'Vide_url' => 'required'
        ]);

        $data = new video_gallery;
        $data->title_en = $request->input('title_en');
        $data->title_bn = $request->input('title_bn');
        $data->embed_code = $request->input('Vide_url');
        $data->type = $request->input('type');
        $result = $data->save();
        if($result){
            return redirect()->route('video.index')->with('success','Video Gallery created Successfully!');
        }else{
            return redirect()->route('video.index')->with('error','Something went wrong, please try again!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit = video_gallery::findOrFail($id);
        return view('admin.gallery.video.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title_en' => 'required',
            'title_bn' => 'required',
            'Vide_url' => 'required'
        ]);

        $data = video_gallery::findOrFail($id);
        $data->title_en = $request->input('title_en');
        $data->title_bn = $request->input('title_bn');
        $data->embed_code = $request->input('Vide_url');
        $data->type = $request->input('type');
        $result = $data->update();
        if($result){
            return redirect()->route('video.index')->with('success','Video gallery updated successfully!');
        }else{
            return redirect()->route('video.index')->with('error','Something went wrong, please try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = video_gallery::findOrFail($id)->delete();
        if($data){
            return redirect()->route('video.index')->with('success','Gallery iteam delete successfully!');
        }else{
            return redirect()->route('video.index')->with('error','Something went wrong, please try again!');
        }
    }
}
