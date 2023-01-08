@extends('backend.app')
@section('title', 'Mobile Model')
@section('page_title', 'Mobile Model View Page')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Price</h3>
                </div>

                <form method="POST" action="{{ route('store.price') }}">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile_model_id">Mobile Model id</label>
                                    <input type="text" class="form-control" value="{{ $mobile_model->id }}" disabled>
                                    <input type="hidden" name="mobile_model_id" value="{{ $mobile_model->id }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price Type</label>
                                    <select class="form-control" name="price_type" id="price_type">
                                        <option>Please Choose</option>
                                        <option value="official" {{ old('price_type') == 'official' ? 'selected' : '' }}>
                                            Official
                                        </option>
                                        <option value="unofficial"
                                            {{ old('price_type') == 'unofficial' ? 'selected' : '' }}>
                                            Unofficial</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" name="price" id="price"
                                        placeholder="Enter Price" value="{{ old('price') }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="variant">Variant</label>
                                    <input type="text" class="form-control" name="variant" id="variant"
                                        placeholder="Enter variant" value="{{ old('variant') }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price_other">Price Other</label>
                                    <input type="text" class="form-control" name="price_other" id="price_other"
                                        placeholder="Enter Price Other" value="{{ old('price_other') }}">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Price</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">SL</th>
                                <th>Variant</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prices as $price)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $price->variant }}</td>
                                    <td>{{ $price->price_type }}</td>
                                    <td>{{ $price->price }}</td>
                                    <td>
                                        <form action="{{ route('delete.price', $price->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $mobile_model->model_name }}</h3>
                </div>
                <div class="card-body">
                    <h5>Model OverView Section:</h5>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 {{ checkMobileModelViewClass($mobile_model->model_name) }}">
                                    Model Name: {{ checkMobileModelViewField($mobile_model->model_name) }}
                                </div>
                                <div class="col-md-6 {{ checkMobileModelViewClass($mobile_model->model_slug) }}">
                                    Model Slug: {{ checkMobileModelViewField($mobile_model->model_slug) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 {{ checkMobileModelViewClass($mobile_model->model_Keyword) }}">
                                    Model Keyword: {{ checkMobileModelViewField($mobile_model->model_Keyword) }}
                                </div>
                                <div class="col-md-6 {{ checkMobileModelViewClass($mobile_model->model_colors) }}">
                                    Model Colors: {{ checkMobileModelViewField($mobile_model->model_colors) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 {{ checkMobileModelViewClass($mobile_model->model_title) }}">
                                    Model Title: {{ checkMobileModelViewField($mobile_model->model_title) }}
                                </div>
                                <div class="col-md-6 {{ checkMobileModelViewClass($mobile_model->model_other) }}">
                                    Model Other: {{ checkMobileModelViewField($mobile_model->model_other) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 {{ checkMobileModelViewClass($mobile_model->model_type) }}">
                                    Model Type: {{ checkMobileModelViewField($mobile_model->model_type) }}
                                </div>
                                <div class="col-md-6 {{ checkMobileModelViewClass($mobile_model->model_description) }}">
                                    Model Description: {{ checkMobileModelViewField($mobile_model->model_description) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 {{ checkMobileModelViewClass($mobile_brand->brand_name) }}">
                                    Brand Name: {{ checkMobileModelViewField($mobile_brand->brand_name) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            @if ($mobile_model->model_image)
                                <img src={{ url('images/model_images/' . $mobile_model->model_image) }} width="400"
                                    height="200" />
                            @endif
                        </div>
                    </div>

                    <hr>
                    <h5>Model Network Section:</h5>
                    <div class="row">
                        <div class="col-md-4 {{ checkMobileModelViewClass($network->technology) }}">
                            Technology: {{ checkMobileModelViewField($network->technology) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($network->_2g_bands) }}">
                            2G Bands: {{ checkMobileModelViewField($network->_2g_bands) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($network->_3g_bands) }}">
                            3G Bands: {{ checkMobileModelViewField($network->_3g_bands) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($network->_4g_bands) }}">
                            4G Bands: {{ checkMobileModelViewField($network->_4g_bands) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($network->_5g_bands) }}">
                            5G Bands: {{ checkMobileModelViewField($network->_5g_bands) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($network->speed) }}">
                            Speed: {{ checkMobileModelViewField($network->speed) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($network->network_other) }}">
                            Network Other: {{ checkMobileModelViewField($network->network_other) }}
                        </div>
                    </div>

                    <hr>
                    <h5>Model Launch Section:</h5>
                    <div class="row">
                        <div class="col-md-4 {{ checkMobileModelViewClass($launch->announced) }}">
                            Announced: {{ checkMobileModelViewField($launch->announced) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($launch->launch_status) }}">
                            Status: {{ checkMobileModelViewField($launch->launch_status) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($launch->launche_other) }}">
                            Launche Other: {{ checkMobileModelViewField($launch->launche_other) }}
                        </div>
                    </div>

                    <hr>
                    <h5>Model Body Section:</h5>
                    <div class="row">
                        <div class="col-md-4 {{ checkMobileModelViewClass($body->dimensions) }}">
                            Dimensions: {{ checkMobileModelViewField($body->dimensions) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($body->weight) }}">
                            Weight: {{ checkMobileModelViewField($body->weight) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($body->build) }}">
                            Build: {{ checkMobileModelViewField($body->build) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($body->sim) }}">
                            SIM: {{ checkMobileModelViewField($body->sim) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($body->body_other) }}">
                            Body Other: {{ checkMobileModelViewField($body->body_other) }}
                        </div>
                    </div>

                    <hr>
                    <h5>Model Display Section:</h5>
                    <div class="row">
                        <div class="col-md-4 {{ checkMobileModelViewClass($display->display_type) }}">
                            Display Type: {{ checkMobileModelViewField($display->display_type) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($display->display_size) }}">
                            Display Size: {{ checkMobileModelViewField($display->display_size) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($display->resolution) }}">
                            Resolution: {{ checkMobileModelViewField($display->resolution) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($display->protection) }}">
                            Display Protection: {{ checkMobileModelViewField($display->protection) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($display->display_other) }}">
                            Display Other: {{ checkMobileModelViewField($display->display_other) }}
                        </div>
                    </div>

                    <hr>
                    <h5>Model Platform Section:</h5>
                    <div class="row">
                        <div class="col-md-4 {{ checkMobileModelViewClass($platform->os) }}">
                            OS: {{ checkMobileModelViewField($platform->os) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($platform->chipset) }}">
                            Chipset: {{ checkMobileModelViewField($platform->chipset) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($platform->cpu) }}">
                            CPU: {{ checkMobileModelViewField($platform->cpu) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($platform->gpu) }}">
                            GPU: {{ checkMobileModelViewField($platform->gpu) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($platform->platform_other) }}">
                            Platform Other: {{ checkMobileModelViewField($platform->platform_other) }}
                        </div>
                    </div>

                    <hr>
                    <h5>Model Memory Section:</h5>
                    <div class="row">
                        <div class="col-md-4 {{ checkMobileModelViewClass($memory->card_slot) }}">
                            Card Slot: {{ checkMobileModelViewField($memory->card_slot) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($memory->internal) }}">
                            Internal: {{ checkMobileModelViewField($memory->internal) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($memory->memory_other) }}">
                            Memory Other: {{ checkMobileModelViewField($memory->memory_other) }}
                        </div>
                    </div>

                    <hr>
                    <h5>Model Main Camera Section:</h5>
                    <div class="row">
                        <div class="col-md-4 {{ checkMobileModelViewClass($mainCamera->main_camera_camera) }}">
                            Main Camera: {{ checkMobileModelViewField($mainCamera->main_camera_camera) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($mainCamera->main_camera_features) }}">
                            Main Camera Features: {{ checkMobileModelViewField($mainCamera->main_camera_features) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($mainCamera->main_camera_video) }}">
                            Main Camera Video: {{ checkMobileModelViewField($mainCamera->main_camera_video) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($mainCamera->main_camera_other) }}">
                            Main Camera Other: {{ checkMobileModelViewField($mainCamera->main_camera_other) }}
                        </div>
                    </div>

                    <hr>
                    <h5>Model Selfie Camera Section:</h5>
                    <div class="row">
                        <div class="col-md-4 {{ checkMobileModelViewClass($selfieCamera->selfie_camera_camera) }}">
                            Selfie Camera: {{ checkMobileModelViewField($selfieCamera->selfie_camera_camera) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($selfieCamera->selfie_camera_features) }}">
                            Selfie Camera Features: {{ checkMobileModelViewField($selfieCamera->selfie_camera_features) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($selfieCamera->selfie_camera_video) }}">
                            Selfie Camera Video: {{ checkMobileModelViewField($selfieCamera->selfie_camera_video) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($selfieCamera->selfie_camera_other) }}">
                            Selfie Camera Other: {{ checkMobileModelViewField($selfieCamera->selfie_camera_other) }}
                        </div>
                    </div>

                    <hr>
                    <h5>Model Sound Section:</h5>
                    <div class="row">
                        <div class="col-md-4 {{ checkMobileModelViewClass($sound->loudspeaker) }}">
                            Loudspeaker: {{ checkMobileModelViewField($sound->loudspeaker) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($sound->_3_5mm_jack) }}">
                            3.5mm Jack: {{ checkMobileModelViewField($sound->_3_5mm_jack) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($sound->sound_other) }}">
                            Sound Other: {{ checkMobileModelViewField($sound->sound_other) }}
                        </div>
                    </div>

                    <hr>
                    <h5>Model Connectivity Section:</h5>
                    <div class="row">
                        <div class="col-md-4 {{ checkMobileModelViewClass($connectivity->wlan) }}">
                            WLAN: {{ checkMobileModelViewField($connectivity->wlan) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($connectivity->bluetooth) }}">
                            Bluetooth: {{ checkMobileModelViewField($connectivity->bluetooth) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($connectivity->positioning) }}">
                            Positioning: {{ checkMobileModelViewField($connectivity->positioning) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($connectivity->nfc) }}">
                            NFC: {{ checkMobileModelViewField($connectivity->nfc) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($connectivity->infrared_port) }}">
                            Infrared Port: {{ checkMobileModelViewField($connectivity->infrared_port) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($connectivity->radio) }}">
                            Radio: {{ checkMobileModelViewField($connectivity->radio) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($connectivity->usb) }}">
                            USB: {{ checkMobileModelViewField($connectivity->usb) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($connectivity->connectivity_other) }}">
                            Connectivity Other: {{ checkMobileModelViewField($connectivity->connectivity_other) }}
                        </div>
                    </div>

                    <hr>
                    <h5>Model Feature Section:</h5>
                    <div class="row">
                        <div class="col-md-4 {{ checkMobileModelViewClass($feature->sensors) }}">
                            Sensors: {{ checkMobileModelViewField($feature->sensors) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($feature->feature_other) }}">
                            Feature Other: {{ checkMobileModelViewField($feature->feature_other) }}
                        </div>
                    </div>

                    <hr>
                    <h5>Model Battery Section:</h5>
                    <div class="row">
                        <div class="col-md-4 {{ checkMobileModelViewClass($battery->battery_type) }}">
                            Battery Type: {{ checkMobileModelViewField($battery->battery_type) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($battery->charging) }}">
                            Charging: {{ checkMobileModelViewField($battery->charging) }}
                        </div>
                        <div class="col-md-4 {{ checkMobileModelViewClass($battery->battery_other) }}">
                            Battery Other: {{ checkMobileModelViewField($battery->battery_other) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
