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
                            @foreach ($mobile_model->prices as $price)
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
                                @if ($mobile_model->mobileBrand)
                                    <div
                                        class="col-md-6 {{ checkMobileModelViewClass($mobile_model->mobileBrand->brand_name) }}">
                                        Brand Name: {{ checkMobileModelViewField($mobile_model->mobileBrand->brand_name) }}
                                    </div>
                                @endif
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
                        @if ($mobile_model->network)
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->network->technology) }}">
                                Technology: {{ checkMobileModelViewField($mobile_model->network->technology) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->network->_2g_bands) }}">
                                2G Bands: {{ checkMobileModelViewField($mobile_model->network->_2g_bands) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->network->_3g_bands) }}">
                                3G Bands: {{ checkMobileModelViewField($mobile_model->network->_3g_bands) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->network->_4g_bands) }}">
                                4G Bands: {{ checkMobileModelViewField($mobile_model->network->_4g_bands) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->network->_5g_bands) }}">
                                5G Bands: {{ checkMobileModelViewField($mobile_model->network->_5g_bands) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->network->speed) }}">
                                Speed: {{ checkMobileModelViewField($mobile_model->network->speed) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->network->network_other) }}">
                                Network Other: {{ checkMobileModelViewField($mobile_model->network->network_other) }}
                            </div>
                        @endif
                    </div>

                    <hr>
                    <h5>Model Launch Section:</h5>
                    <div class="row">
                        @if ($mobile_model->launch)
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->launch->announced) }}">
                                Announced: {{ checkMobileModelViewField($mobile_model->launch->announced) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->launch->launch_status) }}">
                                Status: {{ checkMobileModelViewField($mobile_model->launch->launch_status) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->launch->launche_other) }}">
                                Launche Other: {{ checkMobileModelViewField($mobile_model->launch->launche_other) }}
                            </div>
                        @endif
                    </div>

                    <hr>
                    <h5>Model Body Section:</h5>
                    <div class="row">
                        @if ($mobile_model->body)
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->body->dimensions) }}">
                                Dimensions: {{ checkMobileModelViewField($mobile_model->body->dimensions) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->body->weight) }}">
                                Weight: {{ checkMobileModelViewField($mobile_model->body->weight) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->body->build) }}">
                                Build: {{ checkMobileModelViewField($mobile_model->body->build) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->body->sim) }}">
                                SIM: {{ checkMobileModelViewField($mobile_model->body->sim) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->body->body_other) }}">
                                Body Other: {{ checkMobileModelViewField($mobile_model->body->body_other) }}
                            </div>
                        @endif
                    </div>

                    <hr>
                    <h5>Model Display Section:</h5>
                    <div class="row">
                        @if ($mobile_model->display)
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->display->display_type) }}">
                                Display Type: {{ checkMobileModelViewField($mobile_model->display->display_type) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->display->display_size) }}">
                                Display Size: {{ checkMobileModelViewField($mobile_model->display->display_size) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->display->resolution) }}">
                                Resolution: {{ checkMobileModelViewField($mobile_model->display->resolution) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->display->protection) }}">
                                Display Protection: {{ checkMobileModelViewField($mobile_model->display->protection) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->display->display_other) }}">
                                Display Other: {{ checkMobileModelViewField($mobile_model->display->display_other) }}
                            </div>
                        @endif
                    </div>

                    <hr>
                    <h5>Model Platform Section:</h5>
                    <div class="row">
                        @if ($mobile_model->platform)
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->platform->os) }}">
                                OS: {{ checkMobileModelViewField($mobile_model->platform->os) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->platform->chipset) }}">
                                Chipset: {{ checkMobileModelViewField($mobile_model->platform->chipset) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->platform->cpu) }}">
                                CPU: {{ checkMobileModelViewField($mobile_model->platform->cpu) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->platform->gpu) }}">
                                GPU: {{ checkMobileModelViewField($mobile_model->platform->gpu) }}
                            </div>
                            <div
                                class="col-md-4 {{ checkMobileModelViewClass($mobile_model->platform->platform_other) }}">
                                Platform Other: {{ checkMobileModelViewField($mobile_model->platform->platform_other) }}
                            </div>
                        @endif
                    </div>

                    <hr>
                    <h5>Model Memory Section:</h5>
                    <div class="row">
                        @if ($mobile_model->memory)
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->memory->card_slot) }}">
                                Card Slot: {{ checkMobileModelViewField($mobile_model->memory->card_slot) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->memory->internal) }}">
                                Internal: {{ checkMobileModelViewField($mobile_model->memory->internal) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->memory->memory_other) }}">
                                Memory Other: {{ checkMobileModelViewField($mobile_model->memory->memory_other) }}
                            </div>
                        @endif
                    </div>

                    <hr>
                    <h5>Model Main Camera Section:</h5>
                    <div class="row">
                        @if ($mobile_model->mainCamera)
                            <div
                                class="col-md-4 {{ checkMobileModelViewClass($mobile_model->mainCamera->main_camera_camera) }}">
                                Main Camera: {{ checkMobileModelViewField($mobile_model->mainCamera->main_camera_camera) }}
                            </div>
                            <div
                                class="col-md-4 {{ checkMobileModelViewClass($mobile_model->mainCamera->main_camera_features) }}">
                                Main Camera Features:
                                {{ checkMobileModelViewField($mobile_model->mainCamera->main_camera_features) }}
                            </div>
                            <div
                                class="col-md-4 {{ checkMobileModelViewClass($mobile_model->mainCamera->main_camera_video) }}">
                                Main Camera Video:
                                {{ checkMobileModelViewField($mobile_model->mainCamera->main_camera_video) }}
                            </div>
                            <div
                                class="col-md-4 {{ checkMobileModelViewClass($mobile_model->mainCamera->main_camera_other) }}">
                                Main Camera Other:
                                {{ checkMobileModelViewField($mobile_model->mainCamera->main_camera_other) }}
                            </div>
                        @endif
                    </div>

                    <hr>
                    <h5>Model Selfie Camera Section:</h5>
                    <div class="row">
                        @if ($mobile_model->selfieCamera)
                            <div
                                class="col-md-4 {{ checkMobileModelViewClass($mobile_model->selfieCamera->selfie_camera_camera) }}">
                                Selfie Camera:
                                {{ checkMobileModelViewField($mobile_model->selfieCamera->selfie_camera_camera) }}
                            </div>
                            <div
                                class="col-md-4 {{ checkMobileModelViewClass($mobile_model->selfieCamera->selfie_camera_features) }}">
                                Selfie Camera Features:
                                {{ checkMobileModelViewField($mobile_model->selfieCamera->selfie_camera_features) }}
                            </div>
                            <div
                                class="col-md-4 {{ checkMobileModelViewClass($mobile_model->selfieCamera->selfie_camera_video) }}">
                                Selfie Camera Video:
                                {{ checkMobileModelViewField($mobile_model->selfieCamera->selfie_camera_video) }}
                            </div>
                            <div
                                class="col-md-4 {{ checkMobileModelViewClass($mobile_model->selfieCamera->selfie_camera_other) }}">
                                Selfie Camera Other:
                                {{ checkMobileModelViewField($mobile_model->selfieCamera->selfie_camera_other) }}
                            </div>
                        @endif
                    </div>

                    <hr>
                    <h5>Model Sound Section:</h5>
                    <div class="row">
                        @if ($mobile_model->sound)
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->sound->loudspeaker) }}">
                                Loudspeaker: {{ checkMobileModelViewField($mobile_model->sound->loudspeaker) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->sound->_3_5mm_jack) }}">
                                3.5mm Jack: {{ checkMobileModelViewField($mobile_model->sound->_3_5mm_jack) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->sound->sound_other) }}">
                                Sound Other: {{ checkMobileModelViewField($mobile_model->sound->sound_other) }}
                            </div>
                        @endif
                    </div>

                    <hr>
                    <h5>Model Connectivity Section:</h5>
                    <div class="row">
                        @if ($mobile_model->connectivity)
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->connectivity->wlan) }}">
                                WLAN: {{ checkMobileModelViewField($mobile_model->connectivity->wlan) }}
                            </div>
                            <div
                                class="col-md-4 {{ checkMobileModelViewClass($mobile_model->connectivity->bluetooth) }}">
                                Bluetooth: {{ checkMobileModelViewField($mobile_model->connectivity->bluetooth) }}
                            </div>
                            <div
                                class="col-md-4 {{ checkMobileModelViewClass($mobile_model->connectivity->positioning) }}">
                                Positioning: {{ checkMobileModelViewField($mobile_model->connectivity->positioning) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->connectivity->nfc) }}">
                                NFC: {{ checkMobileModelViewField($mobile_model->connectivity->nfc) }}
                            </div>
                            <div
                                class="col-md-4 {{ checkMobileModelViewClass($mobile_model->connectivity->infrared_port) }}">
                                Infrared Port: {{ checkMobileModelViewField($mobile_model->connectivity->infrared_port) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->connectivity->radio) }}">
                                Radio: {{ checkMobileModelViewField($mobile_model->connectivity->radio) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->connectivity->usb) }}">
                                USB: {{ checkMobileModelViewField($mobile_model->connectivity->usb) }}
                            </div>
                            <div
                                class="col-md-4 {{ checkMobileModelViewClass($mobile_model->connectivity->connectivity_other) }}">
                                Connectivity Other:
                                {{ checkMobileModelViewField($mobile_model->connectivity->connectivity_other) }}
                            </div>
                        @endif
                    </div>

                    <hr>
                    <h5>Model Feature Section:</h5>
                    <div class="row">
                        @if ($mobile_model->feature)
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->feature->sensors) }}">
                                Sensors: {{ checkMobileModelViewField($mobile_model->feature->sensors) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->feature->feature_other) }}">
                                Feature Other: {{ checkMobileModelViewField($mobile_model->feature->feature_other) }}
                            </div>
                        @endif
                    </div>

                    <hr>
                    <h5>Model Battery Section:</h5>
                    <div class="row">
                        @if ($mobile_model->battery)
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->battery->battery_type) }}">
                                Battery Type: {{ checkMobileModelViewField($mobile_model->battery->battery_type) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->battery->charging) }}">
                                Charging: {{ checkMobileModelViewField($mobile_model->battery->charging) }}
                            </div>
                            <div class="col-md-4 {{ checkMobileModelViewClass($mobile_model->battery->battery_other) }}">
                                Battery Other: {{ checkMobileModelViewField($mobile_model->battery->battery_other) }}
                            </div>
                        @endif
                    </div>

                </div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('mobile.model.published', $mobile_model->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
