<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{


    public function getCategoryTree()
    {
        $categories = Category::with('children')->where('parent_id', 0)->get();
        return response()->json($categories);
    }
    public function getHomeCategories()
    {
        $homecategories = Category::where('parent_id', 0)->where('is_homepage', 1)->withCount('total')->with('children')->get();
        return response()->json($homecategories);
    }

    public function createCategory(Request $request)
    {

        $slug = $request->name . "-slug";
        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'parent_id' => $request->parent_id,
            'is_homepage' => $request->is_homepage,
            'status' => $request->status
        ]);
        return json_encode("Done");
    }
}
