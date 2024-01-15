<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = page::orderBy('id','DESC')->get();
        return view('admin.page.index', compact('page'));
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
            'page_title_en'=>'required|unique:pages,page_title_en',
            'page_title_bn'=>'required|unique:pages,page_title_en',
            'page_content_en'=>'required',
            'page_content_bn'=>'required',
        ]);
        $slug = Str::slug($request->input('page_title_en'),'-');

        $page = new page;
        $page->page_title_en = $request->input('page_title_en');
        $page->slug = $slug;
        $page->page_title_bn = $request->input('page_title_bn');
        $page->page_content_en = $request->input('page_content_en');
        $page->page_content_bn = $request->input('page_content_bn');
        $result = $page->save();
        if($result==true){
            return redirect()->route('page.index')->with('success','Page Created successfully!');
        }else{
            return redirect()->route('page.index')->with('error','Something went wrong, please try again!');
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
        $edit = page::findOrFail($id);
        return view('admin.page.edit', compact('edit'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'page_title_en'=>'required|unique:pages,page_title_en,'.$id,
            'page_title_bn'=>'required|unique:pages,page_title_bn,'.$id,
            'page_content_en'=>'required',
            'page_content_bn'=>'required',
        ]);
        $slug = Str::slug($request->input('page_title_en'),'-');

        $page = page::findOrFail($id);
        $page->page_title_en = $request->input('page_title_en');
        $page->slug = $slug;
        $page->page_title_bn = $request->input('page_title_bn');
        $page->page_content_en = $request->input('page_content_en');
        $page->page_content_bn = $request->input('page_content_bn');
        $result = $page->update();
        if($result==true){
            return redirect()->route('page.index')->with('success','Page Updated successfully!');
        }else{
            return redirect()->route('page.index')->with('error','Something went wrong, please try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $page = page::findOrFail($id)->delete();
        if($page==true){
            return redirect()->route('page.index')->with('success','Page Delete successfully!');
        }else{
            return redirect()->route('page.index')->with('error','Something went wrong, please try again!');
        }
    }
}
