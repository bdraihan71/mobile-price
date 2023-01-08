<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlugGenerateApiController extends Controller
{
    public function slugGenerator(Request $request)
    {   
        $title = $request->title;
        $table_slug_name = $request->table_slug_name;
        $create_slug = Str::slug($title, '-');
        $class_name = "\App\Models\\".$request->model;
        $model = new $class_name;
        $mobile_brand =  $model->where($table_slug_name, $create_slug)->first();
        $new_slug = $mobile_brand == null ? $create_slug : $mobile_brand->brand_slug."-write-something";
        return response()->json([
            'slug' =>  $new_slug
        ]);
    }
}
