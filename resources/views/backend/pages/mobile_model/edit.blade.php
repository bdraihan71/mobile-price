@extends('backend.app')
@section('title', 'Mobile Model')
@section('page_title', 'Mobile Model Edit Page')
@prepend('styles')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
@endprepend

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Mobile Brand</h3>
        </div>
        <form method="POST" action="{{ route('mobile.model.update', $mobile_model->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">

                {{-- for mobile OverView section  --}}
                <h4 class="bg-success pt-2 pb-2 text-center">Model OverView</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="model_name">Model Name</label>
                            <input type="text" class="form-control" name="model_name" id="model_name"
                                placeholder="Enter Model Name" value="{{ old('model_name') ?? $mobile_model->model_name }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="model_slug">Model Slug</label>
                            <input type="text" class="form-control" name="model_slug" id="model_slug"
                                placeholder="Enter Model Slug" value="{{ old('model_slug') ?? $mobile_model->model_slug }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Model Keyword</label>
                            <textarea class="form-control" rows="2" name="model_Keyword" placeholder="Enter Model Keyword">{{ old('model_Keyword') ?? $mobile_model->model_Keyword }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Model Colors</label>
                            <textarea class="form-control" rows="2" name="model_colors" placeholder="Enter Model Colors">{{ old('model_colors') ?? $mobile_model->model_colors }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="model_title">Model Title</label>
                            <input type="text" class="form-control" name="model_title" id="model_title"
                                placeholder="Enter Model Title"
                                value="{{ old('model_title') ?? $mobile_model->model_title }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="model_image">Model Image <small>(w:322*h:420)</small></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="model_image" id="model_image">
                                    <label class="custom-file-label" for="model_image">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="model_other">Model Other</label>
                            <input type="text" class="form-control" name="model_other" id="model_other"
                                placeholder="Network Model Other"
                                value="{{ old('model_other') ?? $mobile_model->model_other }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Model Type</label>
                            <select class="form-control" name="model_type" id="model_type">
                                <option>Please Choose</option>
                                <option value="smartphone"
                                    {{ old('model_type') ?? $mobile_model->model_type == 'smartphone' ? 'selected' : '' }}>
                                    Smart Phone
                                </option>
                                <option value="featurephone"
                                    {{ old('model_type') ?? $mobile_model->model_type == 'featurephone' ? 'selected' : '' }}>
                                    Feature Phone</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Model Description</label>
                            <textarea class="form-control" rows="3" name="model_description" placeholder="Enter Model Description">{{ old('model_description') ?? $mobile_model->model_description }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Brand Name</label>
                            <select class="form-control" name="mobile_brand_id" id="mobile_brand_id">
                                <option>Please Choose</option>
                                @foreach ($mobile_brands as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('mobile_brand_id') ?? $mobile_model->mobile_brand_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->brand_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                {{-- for mobile OverView (extra ) section  --}}
                <h4 class="bg-success pt-2 pb-2 text-center">Model OverView (extra )</h4>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Generate Highlight</label>
                            <select class="form-control" name="sample" id="sample">
                                <option>Please Choose</option>
                                <option value="1" {{ old('sample') == 1 ? 'selected' : '' }}>
                                    Sample 1
                                </option>
                                <option value="2" {{ old('sample') == 2 ? 'selected' : '' }}>
                                    Sample 2
                                </option>
                                <option value="3" {{ old('sample') == 3 ? 'selected' : '' }}>
                                    Sample 3
                                </option>
                                <option value="4" {{ old('sample') == 4 ? 'selected' : '' }}>
                                    Sample 4
                                </option>
                                <option value="5" {{ old('sample') == 5 ? 'selected' : '' }}>
                                    Sample 5
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Model Highlight</label>
                            <textarea class="form-control" rows="5" id="highlight" name="highlight" placeholder="Enter Model highlight">{{ old('highlight') ?? $mobile_model->highlight }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="model_name">Model Pros</label>
                            <textarea id="pros" name="pros">
                                {{ old('pros') ?? $mobile_model->pros }}
                              </textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="model_name">Model Cons</label>
                            <textarea id="cons" name="cons">
                                {{ old('cons') ?? $mobile_model->cons }}
                            </textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="model_name">Model Question and Answer/Opinion</label>
                            <textarea id="question" name="questions">
                                {{ old('questions') ?? $mobile_model->questions }}
                              </textarea>
                        </div>
                    </div>
                </div>

                {{-- for mobile Price section  --}}
                {{-- <h4 class="bg-success pt-2 pb-2 text-center">Model Price</h4>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Price Type</label>
                            <select class="form-control" name="price_type" id="price_type">
                                <option>Please Choose</option>
                                <option value="official" {{ old('price_type') == 'official' ? 'selected' : '' }}>Official
                                </option>
                                <option value="unofficial" {{ old('price_type') == 'unofficial' ? 'selected' : '' }}>
                                    Unofficial</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="variant">Variant</label>
                            <input type="text" class="form-control" name="variant" id="variant"
                                placeholder="Enter Variant" value="{{ old('variant') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price_other">Price Other</label>
                    <input type="text" class="form-control" name="price_other" id="price_other"
                        placeholder="Enter Price Other" value="{{ old('price_other') }}">
                </div> --}}

                {{-- for mobile network section  --}}
                <h4 class="bg-success pt-2 pb-2 text-center">Model Network</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="technology">Technology</label>
                            <input type="text" class="form-control" name="technology" id="technology"
                                placeholder="Enter Technology" value="{{ old('technology') ?? $network->technology }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="_2g_bands">2G Bands</label>
                            <input type="text" class="form-control" name="_2g_bands" id="_2g_bands"
                                placeholder="Enter 2G Bands" value="{{ old('_2g_bands') ?? $network->_2g_bands }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="_3g_bands">3G Bands</label>
                            <input type="text" class="form-control" name="_3g_bands" id="_3g_bands"
                                placeholder="Enter 3G Bands" value="{{ old('_3g_bands') ?? $network->_3g_bands }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="_4g_bands">4G Bands</label>
                            <input type="text" class="form-control" name="_4g_bands" id="_4g_bands"
                                placeholder="Enter 4G Bands" value="{{ old('_4g_bands') ?? $network->_4g_bands }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="_5g_bands">5G Bands</label>
                            <input type="text" class="form-control" name="_5g_bands" id="_5g_bands"
                                placeholder="Enter 5G Bands" value="{{ old('_5g_bands') ?? $network->_5g_bands }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="speed">Speed</label>
                            <input type="text" class="form-control" name="speed" id="speed"
                                placeholder="Speed" value="{{ old('speed') ?? $network->speed }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="network_other">Network Other</label>
                    <input type="text" class="form-control" name="network_other" id="network_other"
                        placeholder="Network Other" value="{{ old('network_other') ?? $network->network_other }}">
                </div>

                {{-- for mobile Launch section  --}}
                <h4 class="bg-success pt-2 pb-2 text-center">Model Launch</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="announced">Announced</label>
                            <input type="text" class="form-control" name="announced" id="announced"
                                placeholder="Enter Announced" value="{{ old('announced') ?? $launch->announced }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="launch_status">Status</label>
                            <input type="text" class="form-control" name="launch_status" id="launch_status"
                                placeholder="Enter Status" value="{{ old('launch_status') ?? $launch->launch_status }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="launche_other">Launche Other</label>
                    <input type="text" class="form-control" name="launche_other" id="launche_other"
                        placeholder="Enter Launche Other" value="{{ old('launche_other') ?? $launch->launche_other }}">
                </div>

                {{-- for mobile Body section  --}}
                <h4 class="bg-success pt-2 pb-2 text-center">Model Body</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dimensions">Dimensions</label>
                            <input type="text" class="form-control" name="dimensions" id="dimensions"
                                placeholder="Enter Dimensions" value="{{ old('dimensions') ?? $body->dimensions }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="text" class="form-control" name="weight" id="weight"
                                placeholder="Enter Weight" value="{{ old('weight') ?? $body->weight }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="build">Build</label>
                            <input type="text" class="form-control" name="build" id="build"
                                placeholder="Enter Build" value="{{ old('build') ?? $body->build }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sim">SIM</label>
                            <input type="text" class="form-control" name="sim" id="sim"
                                placeholder="Enter SIM" value="{{ old('sim') ?? $body->sim }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="body_other">Body Other</label>
                    <input type="text" class="form-control" name="body_other" id="body_other"
                        placeholder="Enter Body Other" value="{{ old('body_other') ?? $body->body_other }}">
                </div>

                {{-- for mobile Display section  --}}
                <h4 class="bg-success pt-2 pb-2 text-center">Model Display</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="display_type">Display Type</label>
                            <input type="text" class="form-control" name="display_type" id="display_type"
                                placeholder="Enter Display Type"
                                value="{{ old('display_type') ?? $display->display_type }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="display_size">Display Size</label>
                            <input type="text" class="form-control" name="display_size" id="display_size"
                                placeholder="Enter Display Size"
                                value="{{ old('display_size') ?? $display->display_size }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="resolution">Resolution</label>
                            <input type="text" class="form-control" name="resolution" id="resolution"
                                placeholder="Enter Resolution" value="{{ old('resolution') ?? $display->resolution }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="protection">Display Protection</label>
                            <input type="text" class="form-control" name="protection" id="protection"
                                placeholder="Enter Display Protection"
                                value="{{ old('protection') ?? $display->protection }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="display_other">Display Other</label>
                            <input type="text" class="form-control" name="display_other" id="display_other"
                                placeholder="Enter Display Other"
                                value="{{ old('display_other') ?? $display->display_other }}">
                        </div>
                    </div>
                </div>

                {{-- for mobile Platform section  --}}
                <h4 class="bg-success pt-2 pb-2 text-center">Model Platform</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="os">OS</label>
                            <input type="text" class="form-control" name="os" id="os"
                                placeholder="Enter OS" value="{{ old('os') ?? $platform->os }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="chipset">Chipset</label>
                            <input type="text" class="form-control" name="chipset" id="chipset"
                                placeholder="Enter Chipset" value="{{ old('chipset') ?? $platform->chipset }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpu">CPU</label>
                            <input type="text" class="form-control" name="cpu" id="cpu"
                                placeholder="Enter CPU" value="{{ old('cpu') ?? $platform->cpu }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gpu">GPU</label>
                            <input type="text" class="form-control" name="gpu" id="gpu"
                                placeholder="Enter GPU" value="{{ old('gpu') ?? $platform->gpu }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="platform_other">Platform Other</label>
                    <input type="text" class="form-control" name="platform_other" id="platform_other"
                        placeholder="Enter platform Other"
                        value="{{ old('platform_other') ?? $platform->platform_other }}">
                </div>

                {{-- for mobile Memory section  --}}
                <h4 class="bg-success pt-2 pb-2 text-center">Model Memory</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="card_slot">Card Slot</label>
                            <input type="text" class="form-control" name="card_slot" id="card_slot"
                                placeholder="Enter Card Slot" value="{{ old('card_slot') ?? $memory->card_slot }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="internal">Internal</label>
                            <input type="text" class="form-control" name="internal" id="internal"
                                placeholder="Enter Internal" value="{{ old('internal') ?? $memory->internal }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="memory_other">Memory Other</label>
                    <input type="text" class="form-control" name="memory_other" id="memory_other"
                        placeholder="Enter Memory Other" value="{{ old('memory_other') ?? $memory->memory_other }}">
                </div>

                {{-- for mobile Main Camera section  --}}
                <h4 class="bg-success pt-2 pb-2 text-center">Model Main Camera</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="main_camera_camera">Main Camera </label>
                            <input type="text" class="form-control" name="main_camera_camera" id="main_camera_camera"
                                placeholder="Enter Main Camera"
                                value="{{ old('main_camera_camera') ?? $mainCamera->main_camera_camera }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="main_camera_features">Main Camera Features</label>
                            <input type="text" class="form-control" name="main_camera_features"
                                id="main_camera_features" placeholder="Enter Main Camera Features"
                                value="{{ old('main_camera_features') ?? $mainCamera->main_camera_features }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="main_camera_video">Main Camera Video</label>
                            <input type="text" class="form-control" name="main_camera_video" id="main_camera_video"
                                placeholder="Enter Main Camera Video"
                                value="{{ old('main_camera_video') ?? $mainCamera->main_camera_video }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="main_camera_other">Main Camera Other</label>
                            <input type="text" class="form-control" name="main_camera_other" id="main_camera_other"
                                placeholder="Enter Main Camera Other"
                                value="{{ old('main_camera_other') ?? $mainCamera->main_camera_other }}">
                        </div>
                    </div>
                </div>

                {{-- for mobile Selfie Camera section  --}}
                <h4 class="bg-success pt-2 pb-2 text-center">Model Selfie Camera</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="selfie_camera_camera">Selfie Camera </label>
                            <input type="text" class="form-control" name="selfie_camera_camera"
                                id="selfie_camera_camera" placeholder="Enter Selfie Camera"
                                value="{{ old('selfie_camera_camera') ?? $selfieCamera->selfie_camera_camera }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="selfie_camera_features">Selfie Camera Features</label>
                            <input type="text" class="form-control" name="selfie_camera_features"
                                id="selfie_camera_features" placeholder="Enter Selfie Camera Features"
                                value="{{ old('selfie_camera_features') ?? $selfieCamera->selfie_camera_features }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="selfie_camera_video">Selfie Camera Video</label>
                            <input type="text" class="form-control" name="selfie_camera_video"
                                id="selfie_camera_video" placeholder="Enter Selfie Camera Video"
                                value="{{ old('selfie_camera_video') ?? $selfieCamera->selfie_camera_video }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="selfie_camera_other">Selfie Camera Other</label>
                            <input type="text" class="form-control" name="selfie_camera_other"
                                id="selfie_camera_other" placeholder="Enter Selfie Camera Other"
                                value="{{ old('selfie_camera_other') ?? $selfieCamera->selfie_camera_other }}">
                        </div>
                    </div>
                </div>

                {{-- for mobile Sound section  --}}
                <h4 class="bg-success pt-2 pb-2 text-center">Model Sound</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="loudspeaker">Loudspeaker</label>
                            <input type="text" class="form-control" name="loudspeaker" id="loudspeaker"
                                placeholder="Enter Loudspeaker" value="{{ old('loudspeaker') ?? $sound->loudspeaker }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="_3_5mm_jack">3.5mm Jack</label>
                            <input type="text" class="form-control" name="_3_5mm_jack" id="_3_5mm_jack"
                                placeholder="Enter 3.5mm Jack" value="{{ old('_3_5mm_jack') ?? $sound->_3_5mm_jack }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sound_other">Sound Other</label>
                    <input type="text" class="form-control" name="sound_other" id="sound_other"
                        placeholder="Enter Sound Other" value="{{ old('sound_other') ?? $sound->sound_other }}">
                </div>

                {{-- for mobile Connectivity section  --}}
                <h4 class="bg-success pt-2 pb-2 text-center">Model Connectivity</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="wlan">WLAN</label>
                            <input type="text" class="form-control" name="wlan" id="wlan"
                                placeholder="Enter WLAN" value="{{ old('wlan') ?? $connectivity->wlan }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bluetooth">Bluetooth</label>
                            <input type="text" class="form-control" name="bluetooth" id="bluetooth"
                                placeholder="Enter Bluetooth" value="{{ old('bluetooth') ?? $connectivity->bluetooth }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="positioning">Positioning</label>
                            <input type="text" class="form-control" name="positioning" id="positioning"
                                placeholder="Enter Positioning"
                                value="{{ old('positioning') ?? $connectivity->positioning }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nfc">NFC</label>
                            <input type="text" class="form-control" name="nfc" id="nfc"
                                placeholder="Enter NFC" value="{{ old('nfc') ?? $connectivity->nfc }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="infrared_port">Infrared Port</label>
                            <input type="text" class="form-control" name="infrared_port" id="infrared_port"
                                placeholder="Enter Infrared Port"
                                value="{{ old('infrared_port') ?? $connectivity->infrared_port }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="radio">Radio</label>
                            <input type="text" class="form-control" name="radio" id="radio"
                                placeholder="Enter Radio" value="{{ old('radio') ?? $connectivity->radio }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="usb">USB</label>
                            <input type="text" class="form-control" name="usb" id="usb"
                                placeholder="Enter USB" value="{{ old('usb') ?? $connectivity->usb }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="connectivity_other">Connectivity Other</label>
                            <input type="text" class="form-control" name="connectivity_other" id="connectivity_other"
                                placeholder="Enter Connectivity Other"
                                value="{{ old('connectivity_other') ?? $connectivity->connectivity_other }}">
                        </div>
                    </div>
                </div>

                {{-- for mobile Feature section  --}}
                <h4 class="bg-success pt-2 pb-2 text-center">Model Feature</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sensors">Sensors</label>
                            <input type="text" class="form-control" name="sensors" id="sensors"
                                placeholder="Enter Sensors" value="{{ old('sensors') ?? $feature->sensors }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="feature_other">Feature Other</label>
                            <input type="text" class="form-control" name="feature_other" id="feature_other"
                                placeholder="Enter Feature Other"
                                value="{{ old('feature_other') ?? $feature->feature_other }}">
                        </div>
                    </div>
                </div>

                {{-- for mobile Battery section  --}}
                <h4 class="bg-success pt-2 pb-2 text-center">Model Battery</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="battery_type">Battery Type</label>
                            <input type="text" class="form-control" name="battery_type" id="battery_type"
                                placeholder="Enter Battery Type"
                                value="{{ old('battery_type') ?? $battery->battery_type }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="charging">Charging</label>
                            <input type="text" class="form-control" name="charging" id="charging"
                                placeholder="Enter Charging" value="{{ old('charging') ?? $battery->charging }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="battery_other">Battery Other</label>
                    <input type="text" class="form-control" name="battery_other" id="battery_other"
                        placeholder="Enter Battery Other" value="{{ old('battery_other') ?? $battery->battery_other }}">
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    @push('scripts')
        <!-- Summernote -->
        <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script>
            // slug generate
            $("#model_name").focusout(function() {
                var title = $('#model_name').val();
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: '/slug_generator?title=' + title + '&model=MobileModel' +
                        '&table_slug_name=model_slug',
                    success: function(data) {
                        console.log(data);
                        $('#model_slug').val(data.slug + '-price-in-bangladesh');
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            // Highlight generate
            $("#sample").change(function() {
                var sample = $(this).children("option:selected").val();
                var model = {{ $mobile_model->id }}
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: '/highlight_generator?sample=' + sample + '&model=' + model,
                    success: function(data) {
                        console.log(data.generator_sample);
                        $('#highlight').val(data.generator_sample);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        </script>

        <script>
            $(function() {
                // Summernote
                $('#pros').summernote({
                    height: 150
                })
                $('#cons').summernote({
                    height: 150
                })
                $('#question').summernote({
                    height: 200
                })
            })
        </script>
    @endpush
@endsection
