<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\category;
use App\Models\Post;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::orderBy('id','DESC')->get();
        $subCategory = SubCategory::orderBy('id','DESC')->get();
        return view('admin.subcategory.index', compact('subCategory','category'));
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
            'subcategory_en' => 'required|unique:sub_categories,subCategory_en,',
            'subcategory_bn' => 'required|unique:sub_categories,subCategory_bn,',
            'parentCategory' => 'required',
        ]);

        $data = new SubCategory;
        $data->cate_id = $request->input('parentCategory');
        $data->subCategory_en = $request->input('subcategory_en');
        $data->subCategory_bn = $request->input('subcategory_bn');
        $result = $data->save();
        if($result==true){
            return redirect()->route('sub-category.index')->with('success','Sub Category added successfully!');
        }else{
            return redirect()->route('sub-category.index')->with('error','Sub Category not added, please try again!');
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
        $category = category::orderBy('id','DESC')->get();
        $edit = SubCategory::findOrFail($id);
        return view('admin.subcategory.edit', compact('category','edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'subcategory_en' => 'required|unique:sub_categories,subCategory_en,'.$id,
            'subcategory_bn' => 'required|unique:sub_categories,subCategory_bn,'.$id,
            'parentCategory' => 'required',
        ]);

        $data = SubCategory::findOrFail($id);
        $data->cate_id = $request->input('parentCategory');
        $data->subCategory_en = $request->input('subcategory_en');
        $data->subCategory_bn = $request->input('subcategory_bn');
        $result = $data->update();
        if($result==true){
            return redirect()->route('sub-category.index')->with('success','Sub Category updated successfully!');
        }else{
            return redirect()->route('sub-category.index')->with('error','Something went wrong, please try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $data = SubCategory::findOrFail($id);
        $post   = Post::where('subcate_id',$data->id)->get();
        if($data){
            if ($post->count()==true ) {
                return redirect()->route('sub-category.index')->with('error','Sub Category is not null!');
            }else{
                $data->delete();
                return redirect()->route('sub-category.index')->with('success','Sub Category delete successfully!');
            }

        }else{
            return redirect()->route('sub-category.index')->with('error','something wrong, please tray again now!');
        }
    }
}
