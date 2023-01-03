<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function getHomeSections()
    {
        // 0- newly added products
        // 1- products on sale
        // 2- top rated products
        // 3- most selling products
        // 4- custom product ids
        $sections = Section::where('status', 1)->get();
        $responses = [];
        foreach ($sections as $section) {
            switch ($section->block_type) {
                case 0:
                    $prod = Section::getNewInProducts(json_decode($section->category_id));
                    $section["products"] = $prod;
                    $section["products_count"] = count($prod);
                    array_push($responses, $section);
                    break;
                case 1:
                    $prod = Section::getOnSaleProducts(json_decode($section->category_id));
                    $section["products"] = $prod;
                    $section["products_count"] = count($prod);
                    array_push($responses, $section);
                    break;
                case 2:
                    $prod = Section::getTopRatedProducts(json_decode($section->category_id));
                    $section["products"] = $prod;
                    $section["products_count"] = count($prod);
                    array_push($responses, $section);
                    break;
                case 4:
                    if($section->products_ids==null){
                    break;
                    }
                    $prod = Section::getProductsBySkus(json_decode($section->products_ids));
                    $section["products"] = $prod;
                    $section["products_count"] = count($prod);
                    array_push($responses, $section);
                    break;
            }
        }

        return response()->json($responses);
    }

    public function createSection(Request $request)
    {

        $slug = $request->block_title . "-slug";

        Section::create([
            'block_title' => $request->block_title,
            'slug' => $slug,
            'status' => $request->status,
            'row_order' => $request->row_order,
            'products_ids' => $request->products_ids,
            'category_id' => $request->category_id,
            'block_type' => $request->block_type
        ]);
        return json_encode("Section " . $slug . " Created Succesfully");
    }
}
