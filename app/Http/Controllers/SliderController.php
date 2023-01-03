<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function getSliders()
    {
        $banners=Slider::where("banner_type",0)->get();
        $sub_banners=Slider::where("banner_type",1)->get();
        return response()->json(['banner'=>$banners,'sub_banner'=>$sub_banners]);

    }
    public function createSlider(Request $request)
    {
            Slider::create([
                'banner_type'=>$request->banner_type,
                'type' => $request->type,
                'type_id' =>$request->type_id,
                'image' => $request->image
            ]);
            // return redirect()->back()->with('success', 'Category has been created successfully.');
            return json_encode("Create Successfully");
        
        }
}
