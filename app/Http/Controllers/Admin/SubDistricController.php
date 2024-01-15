<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\distric;
use App\Models\subDistric;

class SubDistricController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parent = distric::orderBy('id','DESC')->get();
        $data = subDistric::orderBy('id','DESC')->get();
        return view('admin.subdistric.index', compact('data','parent'));
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
            'subdistrics_en' => 'required|unique:sub_districs,subDis_en,',
            'subdistrics_bn' => 'required|unique:sub_districs,subDis_bn,',
            'parentDistrics' => 'required',
        ]);

        $data = new subDistric;
        $data->subDis_en=$request->input('subdistrics_en');
        $data->subDis_bn=$request->input('subdistrics_bn');
        $data->distric_id=$request->input('parentDistrics');
        $result = $data->save();
        if($result==true){
            return redirect()->route('sub-districs.index')->with('success','Sub Districs added successfully!');
        }else{
            return redirect()->route('sub-districs.index')->with('error','Something went wrong, please try again!');
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
        $edit = subDistric::findOrFail($id);
        $parent = distric::orderBy('id','DESC')->get();
        return view('admin.subdistric.edit',compact('edit','parent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'subdistrics_en' => 'required|unique:sub_districs,subDis_en,'.$id,
            'subdistrics_bn' => 'required|unique:sub_districs,subDis_bn,'.$id,
            'parentDistrics' => 'required',
        ]);

        $data = subDistric::findOrFail($id);
        $data->subDis_en=$request->input('subdistrics_en');
        $data->subDis_bn=$request->input('subdistrics_bn');
        $data->distric_id=$request->input('parentDistrics');
        $result = $data->update();
        if($result==true){
            return redirect()->route('sub-districs.index')->with('success','Sub Districs added successfully!');
        }else{
            return redirect()->route('sub-districs.index')->with('error','Something went wrong, please try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = subDistric::findOrFail($id)->delete();
        if($data==true){
            return redirect()->route('sub-districs.index')->with('success','Delete successfully!');
        }else{
            return redirect()->route('sub-districs.index')->with('error','Something went wrong, please try again!');
        }

    }
}
