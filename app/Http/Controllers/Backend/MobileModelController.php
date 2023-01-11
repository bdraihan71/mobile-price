<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Battery;
use App\Models\Body;
use App\Models\Connectivity;
use App\Models\Display;
use App\Models\Feature;
use App\Models\Launch;
use App\Models\MainCamera;
use App\Models\Memory;
use App\Models\MobileBrand;
use App\Models\MobileModel;
use App\Models\Network;
use App\Models\Platform;
use App\Models\Price;
use App\Models\SelfieCamera;
use App\Models\Sound;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class MobileModelController extends Controller
{
    public function index()
    { 
        $mobile_models = MobileModel::get();
        return view('backend.pages.mobile_model.index')->with('mobile_models', $mobile_models);
    }

    public function view($id)
    {
        $mobile_model = MobileModel::find($id);
        return view('backend.pages.mobile_model.view')->with([
            'mobile_model' => $mobile_model,
            'mobile_brand' => $mobile_model->mobileBrand != null ? $mobile_model->mobileBrand : $mobile_model,
            'network' => $mobile_model->network,
            'launch' => $mobile_model->launch,
            'body' => $mobile_model->body,
            'display' => $mobile_model->display,
            'platform' => $mobile_model->platform,
            'memory' => $mobile_model->memory,
            'mainCamera' => $mobile_model->mainCamera,
            'selfieCamera' => $mobile_model->selfieCamera,
            'sound' => $mobile_model->sound,
            'connectivity' => $mobile_model->connectivity,
            'feature' => $mobile_model->feature,
            'battery' => $mobile_model->battery,
            'prices' => $mobile_model->prices
        ]);
    }

    public function create()
    {
        $mobile_brands = MobileBrand::get();
        return view('backend.pages.mobile_model.create')->with('mobile_brands', $mobile_brands);
    }

    public function createByJson()
    {
        return view('backend.pages.mobile_model.create_by_json');
    }

    public function edit($id)
    {
        $mobile_model = MobileModel::find($id);
        $mobile_brands = MobileBrand::get();
        return view('backend.pages.mobile_model.edit')->with([
            'mobile_brands' => $mobile_brands,
            'mobile_model' => $mobile_model,
            'network' => $mobile_model->network,
            'launch' => $mobile_model->launch,
            'body' => $mobile_model->body,
            'display' => $mobile_model->display,
            'platform' => $mobile_model->platform,
            'memory' => $mobile_model->memory,
            'mainCamera' => $mobile_model->mainCamera,
            'selfieCamera' => $mobile_model->selfieCamera,
            'sound' => $mobile_model->sound,
            'connectivity' => $mobile_model->connectivity,
            'feature' => $mobile_model->feature,
            'battery' => $mobile_model->battery
        ]);

    }


    public function modelValidator($request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_brand_id' => 'required',
            'model_name' => 'required',
            'model_slug' => 'required|regex:/^\S*$/u',
            'model_title' => 'required',
            'model_description' => 'required',
            'model_Keyword' => 'required',
            'model_type' => 'required',
            'mobile_brand_id' => 'required',
        ]);

        return $validator;
    }

    public function store(Request $request)
    {
        
        // dd($request->all());
        $validator = $this->modelValidator($request);

        if ($validator->fails()) {
            Alert::error('Validation Error', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }

        $imageName = null;
        if($request->file('model_image') != null)
        {
            $folder='images/model_images';
            $imageName = $request->get('model_slug').'.'.$request->model_image->extension();  
            $request->model_image->move(public_path($folder), $imageName);
        }else{
            Alert::error('Validation Error', "Image Not Found");
            return redirect()->back()->withInput();
        }
        
  
        $mobile_model = new MobileModel;  
        $mobile_model->user_id = auth()->user()->id;  
        $mobile_model->model_name = $request->get('model_name');  
        $mobile_model->model_slug = $request->get('model_slug');  
        $mobile_model->mobile_brand_id = $request->get('mobile_brand_id');  
        $mobile_model->model_type = $request->get('model_type');  
        $mobile_model->model_title = $request->get('model_title');  
        $mobile_model->model_description = $request->get('model_description');  
        $mobile_model->model_Keyword = $request->get('model_Keyword'); 
        $mobile_model->model_other = $request->get('model_other'); 
        $mobile_model->model_colors = $request->get('model_colors'); 
        $mobile_model->model_image = $imageName;
        $mobile_model->save();


        $this->network(null, $mobile_model->id, $request);
        $this->launch(null, $mobile_model->id, $request);
        $this->body(null, $mobile_model->id, $request);
        $this->display(null, $mobile_model->id, $request);
        $this->platform(null, $mobile_model->id, $request);
        $this->memory(null, $mobile_model->id, $request);
        $this->main_Camera(null, $mobile_model->id, $request);
        $this->selfie_Camera(null, $mobile_model->id, $request);
        $this->sound(null, $mobile_model->id, $request);
        $this->connectivity(null, $mobile_model->id, $request);
        $this->feature(null, $mobile_model->id, $request);
        $this->battery(null, $mobile_model->id, $request);

        Alert::success('Success', 'Mobile Model created successfully.');
        return back();
    }

    public function storePrice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_model_id' => 'required',
            'price_type' => 'required',
            'price' => 'required',
            'variant' => 'required'
        ]);

        if ($validator->fails()) {
            Alert::error('Validation Error', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }

        $price = new Price;
        
        $price->user_id = auth()->user()->id;
        $price->mobile_model_id = $request->mobile_model_id;
        $price->price_type = $request->price_type;
        $price->price = $request->price;
        $price->variant = $request->variant;
        $price->price_other = $request->price_other;
        $price->save();

        Alert::success('Success', 'Mobile Price created successfully.');
        return back();
    }

    public function destoryPrice($id)
    {
        $price = Price::find($id);
       
        $price->delete();
        Alert::success('Success', 'Mobile Price Deleted successfully.');
        return back();
       
    }

    // public function edit($id)
    // {
    //     $mobile_brand = MobileBrand::find($id);
    //     return view('backend.pages.mobile_brand.edit')->with('mobile_brand', $mobile_brand);
    // }

    public function update(Request $request, $id)
    {
        $mobile_model = MobileModel::find($id); 
        $mobile_network = Network::where('mobile_model_id',$id)->first();
        $mobile_launch = Launch::where('mobile_model_id',$id)->first();
        $mobile_body = Body::where('mobile_model_id',$id)->first();
        $mobile_display = Display::where('mobile_model_id',$id)->first();
        $mobile_platform = Platform::where('mobile_model_id',$id)->first();
        $mobile_memory = Memory::where('mobile_model_id',$id)->first();
        $mobile_main_camera = MainCamera::where('mobile_model_id',$id)->first();
        $mobile_selfie_camera = SelfieCamera::where('mobile_model_id',$id)->first();
        $mobile_sound = Sound::where('mobile_model_id',$id)->first();
        $mobile_connectivity = Connectivity::where('mobile_model_id',$id)->first();
        $mobile_feature = Feature::where('mobile_model_id',$id)->first();
        $mobile_battery = Battery::where('mobile_model_id',$id)->first();


        $validator = Validator::make($request->all(), [
            'model_name' => 'required',
            'mobile_brand_id' => 'required',
            'model_slug' => 'required|regex:/^\S*$/u',
            'model_title' => 'required',
            'model_description' => 'required',
            'model_Keyword' => 'required',
            'model_type' => 'required'
        ]);

        if ($validator->fails()) {
            Alert::error('Validation Error', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }

        if($request->file('model_image') != null && $mobile_model->model_image != null)
        {
            $folder='images/model_images';
            $imageName = $request->get('model_slug').'.'.$request->model_image->extension();
            $request->model_image->move(public_path($folder), $imageName);
            unlink("images/model_images/".$mobile_model->model_image);
            $mobile_model->model_image = $imageName;
        }
        
        if($request->file('model_image') != null && $mobile_model->model_image == null)
        {
            $folder='images/model_images';
            $imageName = $request->get('model_slug').'.'.$request->model_image->extension();
            $request->model_image->move(public_path($folder), $imageName);
            $mobile_model->model_image = $imageName;
        }
        
        // mobile model
        $mobile_model->user_id = auth()->user()->id;  
        $mobile_model->mobile_brand_id = $request->get('mobile_brand_id');  
        $mobile_model->model_colors = $request->get('model_colors');  
        $mobile_model->model_name = $request->get('model_name');  
        $mobile_model->model_slug = $request->get('model_slug');  
        $mobile_model->model_title = $request->get('model_title');  
        $mobile_model->model_description = $request->get('model_description');  
        $mobile_model->model_Keyword = $request->get('model_Keyword'); 
        $mobile_model->model_other = $request->get('model_other'); 
        $mobile_model->model_type = $request->get('model_type'); 
        $mobile_model->highlight = $request->get('highlight'); 
        $mobile_model->pros = $request->get('pros'); 
        $mobile_model->cons = $request->get('cons'); 
        $mobile_model->questions = $request->get('questions'); 
        $mobile_model->save();

        // model network
        $mobile_network->technology = $request->get('technology'); 
        $mobile_network->_2g_bands = $request->get('_2g_bands'); 
        $mobile_network->_3g_bands = $request->get('_3g_bands'); 
        $mobile_network->_4g_bands = $request->get('_4g_bands'); 
        $mobile_network->_5g_bands = $request->get('_5g_bands'); 
        $mobile_network->speed = $request->get('speed'); 
        $mobile_network->network_other = $request->get('network_other');
        $mobile_network->save();

        // model launch
        $mobile_launch->announced = $request->get('announced');
        $mobile_launch->launch_status = $request->get('launch_status');
        $mobile_launch->launche_other = $request->get('launche_other');
        $mobile_launch->save(); 

        // model body
        $mobile_body->dimensions = $request->get('dimensions');
        $mobile_body->weight = $request->get('weight');
        $mobile_body->build = $request->get('build');
        $mobile_body->sim = $request->get('sim');
        $mobile_body->body_other = $request->get('body_other');
        $mobile_body->save();

        // model display
        $mobile_display->display_type = $request->get('display_type');
        $mobile_display->display_size = $request->get('display_size');
        $mobile_display->resolution = $request->get('resolution');
        $mobile_display->protection = $request->get('protection');
        $mobile_display->display_other = $request->get('display_other');
        $mobile_display->save();

        // model platform
        $mobile_platform->os = $request->get('os');
        $mobile_platform->chipset = $request->get('chipset');
        $mobile_platform->cpu = $request->get('cpu');
        $mobile_platform->gpu = $request->get('gpu');
        $mobile_platform->platform_other = $request->get('platform_other');
        $mobile_platform->save();

        // model memory
        $mobile_memory->card_slot = $request->get('card_slot');
        $mobile_memory->internal = $request->get('internal');
        $mobile_memory->memory_other = $request->get('memory_other');
        $mobile_memory->save();

        // model main_Camera
        $mobile_main_camera->main_camera_camera = $request->get('main_camera_camera');
        $mobile_main_camera->main_camera_features = $request->get('main_camera_features');
        $mobile_main_camera->main_camera_video = $request->get('main_camera_video');
        $mobile_main_camera->main_camera_other = $request->get('main_camera_other');
        $mobile_main_camera->save();
     
        // model selfie_Camera
        $mobile_selfie_camera->selfie_camera_camera = $request->get('selfie_camera_camera');
        $mobile_selfie_camera->selfie_camera_features = $request->get('selfie_camera_features');
        $mobile_selfie_camera->selfie_camera_video = $request->get('selfie_camera_video');
        $mobile_selfie_camera->selfie_camera_other = $request->get('selfie_camera_other');
        $mobile_selfie_camera->save();

        // model sound
        $mobile_sound->loudspeaker = $request->get('loudspeaker');
        $mobile_sound->_3_5mm_jack = $request->get('_3_5mm_jack');
        $mobile_sound->sound_other = $request->get('sound_other');
        $mobile_sound->save();
        
        // model connectivity
        $mobile_connectivity->wlan = $request->get('wlan');
        $mobile_connectivity->bluetooth = $request->get('bluetooth');
        $mobile_connectivity->positioning = $request->get('positioning');
        $mobile_connectivity->nfc = $request->get('nfc');
        $mobile_connectivity->infrared_port = $request->get('infrared_port');
        $mobile_connectivity->radio = $request->get('radio');
        $mobile_connectivity->usb = $request->get('usb');
        $mobile_connectivity->connectivity_other = $request->get('connectivity_other');
        $mobile_connectivity->save();

        // model feature
        $mobile_feature->sensors = $request->get('sensors');
        $mobile_feature->feature_other = $request->get('feature_other');
        $mobile_feature->save();
    
        // model battery
        $mobile_battery->battery_type = $request->get('battery_type');
        $mobile_battery->charging = $request->get('charging');
        $mobile_battery->battery_other = $request->get('battery_other');
        $mobile_battery->save();


        Alert::success('Success', 'Mobile Model Updated successfully.');
        return back();
    }

    // public function destroy($id)
    // {
    //     $mobile_brand = MobileBrand::find($id);
    //     if($mobile_brand != null)
    //     {
    //         unlink("images/brand_images/".$mobile_brand->brand_image);
    //         $mobile_brand->delete();
    //         Alert::success('Success', 'Mobile Brand Deleted successfully.');
    //         return back();
    //     }

    //     Alert::error('Problem', "Something went wrong");
    //     return back();

    // }

    public function storeByJson(Request $request)
    {
        $mobiles = json_decode(file_get_contents($request->file('file')), true);
        $model_name = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);

        $networks =[];
        $launches =[];
        $bodies =[];
        $displays =[];
        $platforms =[];
        $memories = [];
        $main_cameras = [];
        $selfie_cameras = [];
        $sounds = [];
        $connectivities = [];
        $features = [];
        $batteries = [];
        $model_details = [];

        foreach( $mobiles as  $mobile)
        {
            if($mobile['data'] == "Network")
            {
                array_push($networks, $mobile);
            }

            if($mobile['data'] == "Launch")
            {
                array_push($launches, $mobile);
            }

            if($mobile['data'] == "Body")
            {
                array_push($bodies, $mobile);
            }

            if($mobile['data'] == "Display")
            {
                array_push($displays, $mobile);
            }

            if($mobile['data'] == "Platform")
            {
                array_push($platforms, $mobile);
            }

            if($mobile['data'] == "Memory")
            {
                array_push($memories, $mobile);
            }

            if($mobile['data'] == "Main Camera")
            {
                array_push($main_cameras, $mobile);
            }

            if($mobile['data'] == "Selfie camera")
            {
                array_push($selfie_cameras, $mobile);
            }

            if($mobile['data'] == "Sound")
            {
                array_push($sounds, $mobile);
            }

            if($mobile['data'] == "Comms")
            {
                array_push($connectivities, $mobile);
            }

            if($mobile['data'] == "Features")
            {
                array_push($features, $mobile);
            }

            if($mobile['data'] == "Battery")
            {
                array_push($batteries, $mobile);
            }

            if($mobile['data'] == "Misc")
            {
                array_push($model_details, $mobile);
            }
            
        }

        $mobile_model_id = $this->mobileModel($model_name, $model_details);
        $this->network($networks, $mobile_model_id, null);
        $this->launch($launches, $mobile_model_id, null);
        $this->body($bodies, $mobile_model_id, null);
        $this->display($displays, $mobile_model_id, null);
        $this->platform($platforms, $mobile_model_id, null);
        $this->memory($memories, $mobile_model_id, null);
        $this->main_Camera($main_cameras, $mobile_model_id, null);
        $this->selfie_Camera($selfie_cameras, $mobile_model_id, null);
        $this->sound($sounds, $mobile_model_id, null);
        $this->connectivity($connectivities, $mobile_model_id, null);
        $this->feature($features, $mobile_model_id, null);
        $this->battery($batteries, $mobile_model_id, null);


        return response()->json([
            'mobile_model_id' =>  $mobile_model_id
        ]);
            
    }

    public function mobileModel($model_name, $model_details)
    {
        $mobile_model = new MobileModel;
        $mobile_model->user_id = auth()->user()->id;
        $mobile_model->model_name = $model_name;
        $mobile_model->model_colors = $this->getTopicValue($model_details, 'Colors');
        $mobile_model->save();

        return $mobile_model->id;
    }

    public function network($networks, $mobile_model_id, $request)
    {
        $network = new Network;

        $network->user_id = auth()->user()->id;
        $network->mobile_model_id = $mobile_model_id;
        $network->technology = isset($request) ? $request->technology : $this->getTopicValue($networks, 'Technology');
        $network->_2g_bands = isset($request) ? $request->_2g_bands : $this->getTopicValue($networks, '2G bands');
        $network->_3g_bands = isset($request) ? $request->_3g_bands : $this->getTopicValue($networks, '3G bands');
        $network->_4g_bands = isset($request) ? $request->_4g_bands : $this->getTopicValue($networks, '4G bands');
        $network->_5g_bands = isset($request) ? $request->_5g_bands : $this->getTopicValue($networks, '5G bands');
        $network->speed = isset($request) ? $request->speed : $this->getTopicValue($networks, 'Speed');
        $network->network_other = isset($request) ? $request->network_other : $this->getTopicValue($networks, 'other');

        $network->save();  
    }

    public function launch($launches, $mobile_model_id, $request)
    {
        $launch = new Launch;

        $launch->user_id = auth()->user()->id;
        $launch->mobile_model_id = $mobile_model_id;
        $launch->announced = isset($request) ? $request->announced : $this->getTopicValue($launches, 'Announced');
        $launch->launch_status = isset($request) ? $request->launch_status : $this->getTopicValue($launches, 'Status');
        $launch->launche_other = isset($request) ? $request->launche_other : $this->getTopicValue($launches, 'other');

        $launch->save();
    }

    public function body($bodies, $mobile_model_id, $request)
    {
        $body = new Body;

        $body->user_id = auth()->user()->id;
        $body->mobile_model_id = $mobile_model_id;
        $body->dimensions = isset($request) ? $request->dimensions : $this->getTopicValue($bodies, 'Dimensions');
        $body->weight = isset($request) ? $request->weight : $this->getTopicValue($bodies, 'Weight');
        $body->build = isset($request) ? $request->build : $this->getTopicValue($bodies, 'Build');
        $body->sim = isset($request) ? $request->build : $this->getTopicValue($bodies, 'SIM');
        $body->body_other = isset($request) ? $request->body_other : $this->getTopicValue($bodies, 'other');

        $body->save();
    }

    public function display($displays, $mobile_model_id, $request)
    {
        $display = new Display;

        $display->user_id = auth()->user()->id;
        $display->mobile_model_id = $mobile_model_id;
        $display->display_type = isset($request) ? $request->display_type : $this->getTopicValue($displays, 'Type');
        $display->display_size = isset($request) ? $request->display_size : $this->getTopicValue($displays, 'Size');
        $display->resolution = isset($request) ? $request->resolution : $this->getTopicValue($displays, 'Resolution');
        $display->protection = isset($request) ? $request->protection : $this->getTopicValue($displays, 'Protection');
        $display->display_other = isset($request) ? $request->display_other : $this->getTopicValue($displays, 'other');

        $display->save();
    }

    public function platform($platforms, $mobile_model_id, $request)
    {
        $platform = new Platform;

        $platform->user_id = auth()->user()->id;
        $platform->mobile_model_id = $mobile_model_id;
        $platform->os = isset($request) ? $request->os : $this->getTopicValue($platforms, 'OS');
        $platform->chipset = isset($request) ? $request->chipset : $this->getTopicValue($platforms, 'Chipset');
        $platform->cpu = isset($request) ? $request->cpu : $this->getTopicValue($platforms, 'CPU');
        $platform->gpu = isset($request) ? $request->gpu : $this->getTopicValue($platforms, 'GPU');
        $platform->platform_other = isset($request) ? $request->platform_other : $this->getTopicValue($platforms, 'other');

        $platform->save();
    }

    public function memory($memories, $mobile_model_id, $request)
    {
        $memory = new Memory;

        $memory->user_id = auth()->user()->id;
        $memory->mobile_model_id = $mobile_model_id;
        $memory->card_slot = isset($request) ? $request->card_slot : $this->getTopicValue($memories, 'Card slot');
        $memory->internal = isset($request) ? $request->internal : $this->getTopicValue($memories, 'Internal');
        $memory->memory_other = isset($request) ? $request->memory_other : $this->getTopicValue($memories, 'other');

        $memory->save();
    }

    public function main_Camera($main_cameras, $mobile_model_id, $request)
    {
        $main_Camera = new MainCamera;

        $main_Camera->user_id = auth()->user()->id;
        $main_Camera->mobile_model_id = $mobile_model_id;
        $main_Camera->main_camera_camera = isset($request) ? $request->main_camera_camera : $this->getCameraValue($main_cameras);
        $main_Camera->main_camera_features = isset($request) ? $request->main_camera_features : $this->getTopicValue($main_cameras, 'Features');
        $main_Camera->main_camera_video = isset($request) ? $request->main_camera_video : $this->getTopicValue($main_cameras, 'Video');
        $main_Camera->main_camera_other = isset($request) ? $request->main_camera_other : $this->getTopicValue($main_cameras, 'other');

        $main_Camera->save();
    }

    public function selfie_Camera($selfie_cameras, $mobile_model_id, $request)
    {
        $selfie_Camera = new SelfieCamera;

        $selfie_Camera->user_id = auth()->user()->id;
        $selfie_Camera->mobile_model_id = $mobile_model_id;
        $selfie_Camera->selfie_camera_camera = isset($request) ? $request->selfie_camera_camera : $this->getCameraValue($selfie_cameras);
        $selfie_Camera->selfie_camera_features = isset($request) ? $request->selfie_camera_features : $this->getTopicValue($selfie_cameras, 'Features');
        $selfie_Camera->selfie_camera_video = isset($request) ? $request->selfie_camera_video : $this->getTopicValue($selfie_cameras, 'Video');
        $selfie_Camera->selfie_camera_other = isset($request) ? $request->selfie_camera_other : $this->getTopicValue($selfie_cameras, 'other');

        $selfie_Camera->save();
    }

    public function sound($sounds, $mobile_model_id, $request)
    {
        $sound = new Sound;

        $sound->user_id = auth()->user()->id;
        $sound->mobile_model_id = $mobile_model_id;
        $sound->loudspeaker = isset($request) ? $request->loudspeaker : $this->getTopicValue($sounds, 'Loudspeaker ');
        $sound->_3_5mm_jack = isset($request) ? $request->_3_5mm_jack : $this->getTopicValue($sounds, '3.5mm jack ');
        $sound->sound_other = isset($request) ? $request->sound_other : $this->getTopicValue($sounds, 'other');

        $sound->save();
    }

    public function connectivity($connectivities, $mobile_model_id, $request)
    {
        $connectivity = new Connectivity;

        $connectivity->user_id = auth()->user()->id;
        $connectivity->mobile_model_id = $mobile_model_id;
        $connectivity->wlan = isset($request) ? $request->wlan : $this->getTopicValue($connectivities, 'WLAN');
        $connectivity->bluetooth = isset($request) ? $request->bluetooth : $this->getTopicValue($connectivities, 'Bluetooth');
        $connectivity->positioning = isset($request) ? $request->positioning : $this->getTopicValue($connectivities, 'Positioning');
        $connectivity->nfc = isset($request) ? $request->nfc : $this->getTopicValue($connectivities, 'NFC');
        $connectivity->infrared_port = isset($request) ? $request->infrared_port : $this->getTopicValue($connectivities, 'Infrared port');
        $connectivity->radio = isset($request) ? $request->radio : $this->getTopicValue($connectivities, 'Radio');
        $connectivity->usb = isset($request) ? $request->usb : $this->getTopicValue($connectivities, 'USB');
        $connectivity->connectivity_other = isset($request) ? $request->connectivity_other : $this->getTopicValue($connectivities, 'other');

        $connectivity->save();
    }

    public function feature($features, $mobile_model_id, $request)
    {
        $feature = new Feature;

        $feature->user_id = auth()->user()->id;
        $feature->mobile_model_id = $mobile_model_id;
        $feature->sensors = isset($request) ? $request->sensors : $this->getTopicValue($features, 'Sensors');
        $feature->feature_other = isset($request) ? $request->feature_other : $this->getTopicValue($features, 'other');

        $feature->save();
    }

    public function battery($batteries, $mobile_model_id, $request)
    {
        $battery = new Battery;

        $battery->user_id = auth()->user()->id;
        $battery->mobile_model_id = $mobile_model_id;
        $battery->battery_type = isset($request) ? $request->battery_type : $this->getTopicValue($batteries, 'Type');
        $battery->charging = isset($request) ? $request->charging : $this->getTopicValue($batteries, 'Charging');
        $battery->battery_other = isset($request) ? $request->battery_other : $this->getTopicValue($batteries, 'other');

        $battery->save();
    }

    public function getTopicValue($networks, $search_topic)
    {
        $found_key = array_search($search_topic, array_column($networks, 'topic'));
        if( $found_key !== false) {
            return $networks[$found_key]['details'];
        }
        
    }

    public function getCameraValue($networks)
    {
        $cameras = ['Single', 'Dual', 'Triple', 'Quad', 'Penta'];
        foreach($cameras as $camera)
        {
            $found_key = array_search($camera, array_column($networks, 'topic'));
            if( $found_key !== false) {
                return $networks[$found_key]['details'];
            }
        }
    }

    public function published($model_id)
    {
        $mobile_model = MobileModel::find($model_id);
        $mobile_model->is_published = true;
        $mobile_model->save();

        Alert::success('Success', 'Mobile Brand Updated successfully.');
        return redirect()->route('mobile.model.index');
    }
}
