<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;
use App\Models\photo_gallery;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = photo_gallery::orderBy('id','DESC')->get();
        return view('admin.gallery.photo.index',compact('data'));
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
            'photo' => 'required|image'
        ]);

        $data = new photo_gallery;
        $data->title_en = $request->input('title_en');
        $data->title_bn = $request->input('title_bn');
        $data->type = $request->input('type');

        $folder = "Photo_Gallery"."/". Carbon::now()->year . '/' . Carbon::now()->month . '/' . Carbon::now()->day;
        if(!file_exists(base_path('storage/app/public/'). $folder)){
            mkdir(base_path('storage/app/public/') . $folder,666,true);
        }

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $name  = Str::random(25).".".$photo->extension();
            $image = Image::make($photo)->resize(500,310);
            $image->save(base_path('storage/app/public/').$folder."/".$name);
            $data->photo = $folder."/".$name;
        }
        $result = $data->save();
        if($result){
            return redirect()->route('photo.index')->with('success','Photo Gallery created Successfully!');
        }else{
            return redirect()->route('photo.index')->with('error','Something went wrong, please try again!');
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
        $edit = photo_gallery::findOrFail($id);
        return view('admin.gallery.photo.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title_en' => 'required',
            'title_bn' => 'required',
            'photo' => 'required|image'
        ]);

        $data = photo_gallery::findOrFail($id);
        $data->title_en = $request->input('title_en');
        $data->title_bn = $request->input('title_bn');
        $data->type = $request->input('type');

        $folder = "Photo_Gallery"."/". Carbon::now()->year . '/' . Carbon::now()->month . '/' . Carbon::now()->day;


        if($request->hasFile('photo')){
            if(file_exists('storage/'.$data->photo) && $data->photo != ''){
                unlink('storage/'.$data->photo);
            }
            $photo = $request->file('photo');
            $name  = Str::random(25).".".$photo->extension();
            $image = Image::make($photo)->resize(500,310);
            $image->save(base_path('storage/app/public/').$folder."/".$name);
            $data->photo = $folder."/".$name;
        }
        $result = $data->update();
        if($result){
            return redirect()->route('photo.index')->with('success','Photo Gallery updated Successfully!');
        }else{
            return redirect()->route('photo.index')->with('error','Something went wrong, please try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $photo = photo_gallery::findOrFail($id);
        if (file_exists('storage/'.$photo->photo) && $photo->photo !='') {
            unlink('storage/'.$photo->photo);
        }
        $result = $photo->delete();
        if($result){
            return redirect()->route('photo.index')->with('success','Gallery image Delete Successfully!');
        }else{
            return redirect()->route('photo.index')->with('error','Something went wrong, please try again!');
        }
    }
}
