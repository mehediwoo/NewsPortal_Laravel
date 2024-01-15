<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;
use App\Models\category;
use App\Models\SubCategory;
use App\Models\distric;
use App\Models\subDistric;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::orderBy('id','DESC')->get();
        return view('admin.post.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = category::orderBy('id','DESC')->get();
        $distric  = distric::orderBy('id','DESC')->get();
        return view('admin.post.create',compact('category','distric'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'title_bn' => 'required',
            'category' => 'required',
            // 'SubCategory' => 'required',
            'image' => 'required|image',
            'tags_en' => 'required',
            'tags_bn' => 'required',
            'description_en' => 'required',
            'description_bn' => 'required',
        ]);

        $data = new Post;
        $data->cate_id    = $request->input('category');
        $data->subcate_id = $request->input('SubCategory');
        $data->dist_id = $request->input('Districs');
        $data->subdist_id = $request->input('SubDistrics');
        $data->user_id = 10;
        $data->title_en = $request->input('title_en');
        $data->title_bn = $request->input('title_bn');
        $data->desc_en = $request->input('description_en');
        $data->desc_bn = $request->input('description_bn');
        $data->tags_en = $request->input('tags_en');
        $data->tags_bn = $request->input('tags_bn');
        $data->headline = $request->input('headline');
        $data->first_section = $request->input('firstSection');
        $data->first_sec_thumbnail = $request->input('firstSectionThumb');
        $data->big_thumbnail = $request->input('firstSectionBigThumb');

        $folder = Carbon::now()->year . '/' . Carbon::now()->month . '/' . Carbon::now()->day;
        if (!file_exists(base_path('storage/app/public/') . $folder)) {
            mkdir(base_path('storage/app/public/') . $folder, 755, true);
        }

        if($request->hasFile('image')){
            $thumbnail_req = $request->file('image');
            $thumbnail_file_name = Str::random(30).'.'.$thumbnail_req->extension();
            $thumbnail = Image::make($thumbnail_req)->resize(750,500);
            $thumbnail->save(base_path('storage/app/public/' . $folder . '/' . $thumbnail_file_name));
            $data->image = $folder . '/' . $thumbnail_file_name;
        }
        $result = $data->save();
        if($result==true){
            return redirect()->route('post.index')->with('success','Post created Successfully!');
        }else{
            return redirect()->route('post.index')->with('error','Something went wrong, please try again!');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = category::orderBy('id','DESC')->get();
        $distric  = distric::orderBy('id','DESC')->get();
        $edit     = Post::findOrFail($id);
        return view('admin.post.edit',compact('category','distric','edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title_en' => 'required',
            'title_bn' => 'required',
            'category' => 'required',
            // 'SubCategory' => 'required',
            'image' => 'image',
            'tags_en' => 'required',
            'tags_bn' => 'required',
            'description_en' => 'required',
            'description_bn' => 'required',
        ]);

        $data = Post::findOrFail($id);
        $data->cate_id    = $request->input('category');
        $data->subcate_id = $request->input('SubCategory');
        $data->dist_id = $request->input('Districs');
        $data->subdist_id = $request->input('SubDistrics');
        $data->user_id = 10;
        $data->title_en = $request->input('title_en');
        $data->title_bn = $request->input('title_bn');
        $data->desc_en = $request->input('description_en');
        $data->desc_bn = $request->input('description_bn');
        $data->tags_en = $request->input('tags_en');
        $data->tags_bn = $request->input('tags_bn');
        $data->headline = $request->input('headline');
        $data->first_section = $request->input('firstSection');
        $data->first_sec_thumbnail = $request->input('firstSectionThumb');
        $data->big_thumbnail = $request->input('firstSectionBigThumb');

        $folder = Carbon::now()->year . '/' . Carbon::now()->month . '/' . Carbon::now()->day;


        if($request->hasFile('image')){
            if(file_exists('storage/'.$data->image) && $data->image != ''){
                unlink('storage/'.$data->image);
            }
            $thumbnail_req = $request->file('image');
            $thumbnail_file_name = Str::random(30).'.'.$thumbnail_req->extension();
            $thumbnail = Image::make($thumbnail_req)->resize(750,500);
            $thumbnail->save(base_path('storage/app/public/' . $folder . '/' . $thumbnail_file_name));
            $data->image = $folder . '/' . $thumbnail_file_name;
        }
        $result = $data->update();
        if($result==true){
            return redirect()->route('post.index')->with('success','Post Updated Successfully!');
        }else{
            return redirect()->route('post.index')->with('error','Something went wrong, please try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Post::findOrFail($id);
        if (file_exists('storage/'.$data->image) && $data->image !='') {
            unlink('storage/'.$data->image);
        }
        $result = $data->delete();
        if($result){
            return redirect()->route('post.index')->with('success','Post Delete Successfully!');
        }else{
            return redirect()->route('post.index')->with('error','Something went wrong, please try again!');
        }
    }

    // Get Sub Category Json Data
    public function getSubCategory($id)
    {
        $data = SubCategory::where('cate_id',$id)->get();
        return response()->json($data);
    }
    // Get Sub Districs Json Data
    public function getSubDistrics($id)
    {
        $data = subDistric::where('distric_id',$id)->get();
        return response()->json($data);
    }
}
