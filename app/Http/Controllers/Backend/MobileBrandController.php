<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MobileBrand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class MobileBrandController extends Controller
{
    public function index()
    { 
        $mobile_brands = MobileBrand::get();
        return view('backend.pages.mobile_brand.index')->with('mobile_brands', $mobile_brands);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required',
            'brand_slug' => 'required|regex:/^\S*$/u',
            'brand_image' => 'required',
            'brand_title' => 'required',
            'brand_description' => 'required',
            'brand_Keyword' => 'required'
        ]);

        if ($validator->fails()) {
            Alert::error('Validation Error', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }

        $imageName = null;
        if($request->file('brand_image') != null)
        {
            $folder='images/brand_images';
            $imageName = $request->get('brand_slug').'.'.$request->brand_image->extension();  
            $request->brand_image->move(public_path($folder), $imageName);
        }else{
            Alert::error('Validation Error', "Image Not Found");
            return redirect()->back()->withInput();
        }
        
  
        $mobile_brand = new MobileBrand;  
        $mobile_brand->user_id = auth()->user()->id;  
        $mobile_brand->brand_name = $request->get('brand_name');  
        $mobile_brand->brand_slug = $request->get('brand_slug');  
        $mobile_brand->brand_title = $request->get('brand_title');  
        $mobile_brand->brand_description = $request->get('brand_description');  
        $mobile_brand->brand_Keyword = $request->get('brand_Keyword'); 
        $mobile_brand->brand_image = $imageName;
        $mobile_brand->save();

        Alert::success('Success', 'Mobile Brand created successfully.');
        return back();
    }

    public function edit($id)
    {
        $mobile_brand = MobileBrand::find($id);
        return view('backend.pages.mobile_brand.edit')->with('mobile_brand', $mobile_brand);
    }

    public function update(Request $request, $id)
    {
        $mobile_brand = MobileBrand::find($id); 
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required',
            'brand_slug' => 'required|regex:/^\S*$/u',
            'brand_title' => 'required',
            'brand_description' => 'required',
            'brand_Keyword' => 'required'
        ]);

        if ($validator->fails()) {
            Alert::error('Validation Error', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }

        if($request->file('brand_image') != null)
        {
            $folder='images/brand_images';
            $imageName = $request->get('brand_slug').'.'.$request->brand_image->extension();
            $request->brand_image->move(public_path($folder), $imageName);
            unlink("images/brand_images/".$mobile_brand->brand_image);
        }else{
            $brand_image = explode(".", $mobile_brand->brand_image);
            array_shift($brand_image);
            array_unshift($brand_image, $request->get('brand_slug'));
            $imageName = implode(".",$brand_image);
            rename('images/brand_images/'.$mobile_brand->brand_image, 'images/brand_images/'.$imageName);
        }

        $mobile_brand->user_id = auth()->user()->id;  
        $mobile_brand->brand_name = $request->get('brand_name');  
        $mobile_brand->brand_slug = $request->get('brand_slug');  
        $mobile_brand->brand_title = $request->get('brand_title');  
        $mobile_brand->brand_description = $request->get('brand_description');  
        $mobile_brand->brand_Keyword = $request->get('brand_Keyword'); 
        $mobile_brand->brand_image = $imageName;
        $mobile_brand->save();
        Alert::success('Success', 'Mobile Brand Updated successfully.');
        return back();
    }

    public function destroy($id)
    {
        $mobile_brand = MobileBrand::find($id);
        if($mobile_brand != null)
        {
            unlink("images/brand_images/".$mobile_brand->brand_image);
            $mobile_brand->delete();
            Alert::success('Success', 'Mobile Brand Deleted successfully.');
            return back();
        }

        Alert::error('Problem', "Something went wrong");
        return back();

    }
}
