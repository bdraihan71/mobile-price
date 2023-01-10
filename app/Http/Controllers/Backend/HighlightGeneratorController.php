<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MobileModel;
use Illuminate\Http\Request;

class HighlightGeneratorController extends Controller
{
    public function highlightGenerator(Request $request)
    {
        $model_id = $request->model;
        $sample = $request->sample;
        $model = MobileModel::find($model_id);
        return response()->json([
            'generator_sample' => $this->generateText($model)[$sample]
        ]);
    }

    public function generateText($model)
    {
        // dd($model->mainCamera->main_camera_camera);
        $name = $model->model_name;
        $display_type = explode(",",$model->display->display_type);
        $display_size = explode(",",$model->display->display_size);
        return [
            '1' => "$name has a $display_size[0] Fluid Full HD+ $display_type[0] screen. It has its front camera beautifully placed in the most convenient place. It has a triple (50+8+2 MP) camera arrangement at the back with PDAF, OIS, monochrome, ultrawide dual-LED flash etc. and Ultra HD video recording which is the same setup as the original Nord. The ultrawide camera depends on an 8MP Sony IMX 355 sensor behind f/2.25 lens. It has Night Mode but there is no autofocus.
            OnePlus Nord 2 5G has a front camera of 32 MP. The front camera is also carried over from the Nord 2.",
            '2' => "$name has a beautiful $display_size[0] LTPO Super Retina XDR OLED 1290 x 2796 pixels screen."
        ];
    }
}
