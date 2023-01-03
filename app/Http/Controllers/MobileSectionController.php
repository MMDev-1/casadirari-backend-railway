<?php

namespace App\Http\Controllers;

use App\Models\MobileSection;
use Illuminate\Http\Request;

class MobileSectionController extends Controller
{
    public function getMobileSettings()
    {
        $mobile_section = MobileSection::find(1);
        return json_encode($mobile_section);
    }
    public function addMobileSection(Request $request)
    {
        $input = $request->all();
        $mobile_section =MobileSection::create($input);
        return json_encode($mobile_section);
    }
    public function updateMobileSection(Request $request)
    {   $mobile_section = MobileSection::find(1);
        $input = $request->all();
        $mobile_section->update($input);
        // $newfooter->save();
        return json_encode($mobile_section);
    }
}
