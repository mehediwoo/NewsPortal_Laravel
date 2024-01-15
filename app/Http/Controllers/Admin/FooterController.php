<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\footer;
use Image;

class FooterController extends Controller
{
    public function Index()
    {
        $data =footer::first();
        return view('admin.setting.footer.index', compact('data'));
    }

    public function Update(Request $request,$id)
    {
        $request->validate([
            'site_name'=>'required',
            'address_en'=>'required',
            'address_bn'=>'required',
            'phone'=>'required',
            'telephone'=>'required',
            'email'=>'required',
            'logo'=>'image',
        ]);
        $folder = 'logo';
        if (!file_exists(base_path('storage/app/public/') . $folder)) {
            mkdir(base_path('storage/app/public/') . $folder, 666, true);
        }

        $data = footer::findOrFail($id);
        $data->website_title= $request->input('site_name');
        $data->address_en= $request->input('address_en');
        $data->address_bn= $request->input('address_bn');
        $data->phone= $request->input('phone');
        $data->telephone= $request->input('telephone');
        $data->email= $request->input('email');

        if($request->hasFile('logo')){
            if(file_exists('storage/'.$data->website_logo) && $data->website_logo != ''){
                unlink('storage/'.$data->website_logo);
            }

            $logo = $request->file('logo');
            $name = Str::random(30). '.'.$logo->extension();
            $logoFile = Image::make($logo)->resize(177,51);
            $logoFile->save(base_path('storage/app/public/'.$folder.'/'.$name));
            $data->website_logo= $folder.'/'.$name;
        }
        $result= $data->update();

        if($result){
            return redirect()->back()->with('success','Footer save successfully!');
        }else{
            return redirect()->back()->with('error','Something went wrong, try again!');
        }
    }
}
