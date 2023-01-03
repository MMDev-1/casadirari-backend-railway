<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function getFooterSettings()
    {
        $footer = Footer::find(1);
        return json_encode($footer);
    }
    public function addFooterSettings(Request $request)
    {
        $input = $request->all();
        $footer =Footer::create($input);
        return json_encode($footer);
    }
    public function updateFooterSettings(Request $request)
    {   $footer = Footer::find(1);
        $input = $request->all();
        $footer->update($input);
        // $newfooter->save();
        return json_encode($footer);
    }
}
