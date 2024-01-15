<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\SubCategory;
use App\Models\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_category = category::orderBy('id','DESC')->get();
        return view('admin.category.index', compact('all_category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_en' => 'required|unique:categories,category_en,',
            'category_bn' => 'required|unique:categories,category_bn,',
        ]);

        $data = new category;
        $data->category_bn = $request->input('category_bn');
        $data->category_en = $request->input('category_en');
        $result = $data->save();
        if($result==true){
            return redirect()->route('category.index')->with('success','Category added successfully!');
        }else{
            return redirect()->route('category.index')->with('error','Category not added, please try again!');
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
        $edit = category::findOrFail($id);
        return view('admin.category.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'category_en' => 'required|unique:categories,category_en,'.$id,
            'category_bn' => 'required|unique:categories,category_bn,'.$id,
        ]);

        $data = category::findOrFail($id);
        $data->category_bn = $request->input('category_bn');
        $data->category_en = $request->input('category_en');
        $result = $data->update();
        if($result==true){
            return redirect()->route('category.index')->with('success','Category Updated successfully!');
        }else{
            return redirect()->route('category.index')->with('error','Something went wrong, please try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data   = category::findOrFail($id);
        $post   = Post::where('cate_id',$data->id)->get();
        $subCat = SubCategory::where('cate_id',$id)->get();
        if($data){
            if ($post->count()==true OR $subCat->count()==true) {
                return redirect()->route('category.index')->with('error','Category is not null!');
            }else{
                $data->delete();
                return redirect()->route('category.index')->with('success','Category delete successfully!');
            }

        }else{
            return redirect()->route('category.index')->with('error','something wrong, please tray again now!');
        }
    }
}
