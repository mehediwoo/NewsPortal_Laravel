<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\distric;

class DistricController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $distric = distric::orderBy('id','DESC')->get();
        return view('admin.distric.index', compact('distric'));
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
            'distric_en' => 'required|unique:districs,distric_en,',
            'distric_bn' => 'required|unique:districs,distric_bn,',
        ]);
        $data = new distric;
        $data->distric_bn= $request->input('distric_bn');
        $data->distric_en= $request->input('distric_en');
        $result = $data->save();
        if($result==true){
            return redirect()->route('districs.index')->with('success','Distric added successfully!');
        }else{
            return redirect()->route('districs.index')->with('error','Something went wrong, please try again!');
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
        $edit = distric::findOrFail($id);
        return view('admin.distric.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'distric_en' => 'required|unique:districs,distric_en,',
            'distric_bn' => 'required|unique:districs,distric_bn,',
        ]);
        $data = distric::findOrFail($id);
        $data->distric_bn= $request->input('distric_bn');
        $data->distric_en= $request->input('distric_en');
        $result = $data->update();
        if($result==true){
            return redirect()->route('districs.index')->with('success','Distric Eidited successfully!');
        }else{
            return redirect()->route('districs.index')->with('error','Something went wrong, please try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = distric::findOrFail($id)->delete();
        if($data){
            return redirect()->route('districs.index')->with('success','Delete Successfully!');
        }else{
            return redirect()->route('districs.index')->with('error','Something went wrong, please try again!');
        }

    }
}
