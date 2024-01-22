@extends('frontend.app')
@section('title', 'Mobile Brand')
@section('page_title', 'Mobile Home Page')
@prepend('styles')
@endprepend

@section('content')
    <div class="col-lg-5 single-mobile-img">
        <img src="{{ asset('images/model_images/' . $mobile_model->model_image) }}" alt="{{ $mobile_model->model_slug }}">
    </div>
    <div class="col-lg-7 single-mobile-head">
        <h1>{{ $mobile_model->model_name }} Price And Specifications</h1>
        <h5 class="text-center">Key Specifications</h5>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-6 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3"> <i class="far fa-calendar-alt text-info"></i></div>
                            <div class="col-lg-6">
                                <h6 class="m-0">Released</h6>
                                <h6 class="text-bold mobile-head-data">
                                    {{ $mobile_model->launch ? $mobile_model->launch->announced : 'Not Announced' }} </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3"> <i class="fas fa-mobile text-info"></i></div>
                            <div class="col-lg-6">
                                <h6 class="m-0">Display</h6>
                                <h6 class="text-bold mobile-head-data">
                                    {{ $mobile_model->display ? explode(',', $mobile_model->display->display_type)[0] . ', ' . explode(',', $mobile_model->display->display_size)[0] : 'No Data' }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3"> <i class="fas fa-memory text-info"></i></div>
                            <div class="col-lg-6">
                                <h6 class="m-0">ROM RAM</h6>
                                <h6 class="text-bold mobile-head-data">
                                    {{ $mobile_model->memory ? explode(',', $mobile_model->memory->internal)[0] : 'No Data' }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3"> <i class="fas fa-camera text-info"></i></div>
                            <div class="col-lg-6">
                                <h6 class="m-0">Main Camera</h6>
                                <h6 class="text-bold mobile-head-data">
                                    {{ $mobile_model->mainCamera ? explode(',', $mobile_model->mainCamera->main_camera_camera)[0] : 'No Data' }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3"> <i class="fas fa-camera text-info"></i></div>
                            <div class="col-lg-6">
                                <h6 class="m-0">Front Camera</h6>
                                <h6 class="text-bold mobile-head-data">
                                    {{ $mobile_model->selfieCamera ? explode(',', $mobile_model->selfieCamera->selfie_camera_camera)[0] : 'No Data' }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3"> <i class="fas fa-battery-full text-info"></i></div>
                            <div class="col-lg-6">
                                <h6 class="m-0">Battery</h6>
                                <h6 class="text-bold mobile-head-data">
                                    {{ $mobile_model->battery ? explode(',', $mobile_model->battery->battery_type)[0] : 'No Data' }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mt-4">
        <h5 class="bg-info text-center text-bold p-2">{{ $mobile_model->model_name }} Specifications</h5>
        {{-- mobile price --}}
        @if (count($mobile_model->prices) > 0)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>{{ $mobile_model->model_name }} Price In Bangladesh</h5>
                </div>
                <div class="card-body">
                    @foreach ($mobile_model->prices as $item)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Variant - {{ $item->variant }}</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">Price:-
                                {{ $item->price }}({{ $item->price_type }})</div>
                        </div>
                        <hr class="m-1">
                    @endforeach
                </div>
            </div>
        @endif

        {{-- native ads --}}
        <script async="async" data-cfasync="false"
            src="//pl22240365.toprevenuegate.com/b7f6f464eac09e971bbc36b1f46b3234/invoke.js"></script>
        <div id="container-b7f6f464eac09e971bbc36b1f46b3234"></div>

        {{-- mobile overview --}}
        <div class="card">
            <div class="card-header bg-light text-center p-1">
                <h5>Overview</h5>
            </div>
            <div class="card-body">
                @if ($mobile_model->launch->announced)
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Launching Date</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->launch->announced }}</div>
                    </div>
                    <hr class="m-1">
                @endif
                @if ($mobile_model->mobileBrand)
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Brand</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->mobileBrand->brand_name }}
                        </div>
                    </div>
                    <hr class="m-1">
                @endif
                @if ($mobile_model->model_name)
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Model</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->model_name }}</div>
                    </div>
                    <hr class="m-1">
                @endif
                @if ($mobile_model->model_colors)
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Colors</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->model_colors }}</div>
                    </div>
                    <hr class="m-1">
                @endif
                @if ($mobile_model->memory->internal)
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Internal Memory</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->memory->internal }}</div>
                    </div>
                    <hr class="m-1">
                @endif
                @if ($mobile_model->mainCamera->main_camera_camera)
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Main Camera</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                            {{ $mobile_model->mainCamera->main_camera_camera }}</div>
                    </div>
                    <hr class="m-1">
                @endif
                @if ($mobile_model->selfieCamera->selfie_camera_camera)
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Selfie Camera</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                            {{ $mobile_model->selfieCamera->selfie_camera_camera }}</div>
                    </div>
                    <hr class="m-1">
                @endif
                @if ($mobile_model->battery->battery_type)
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Battery</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->battery->battery_type }}
                        </div>
                    </div>
                    <hr class="m-1">
                @endif
                @if ($mobile_model->platform->chipset)
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Chipset</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->platform->chipset }}</div>
                    </div>
                    <hr class="m-1">
                @endif
            </div>
        </div>

        {{-- mobile launch --}}
        @if ($mobile_model->launch)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Launch</h5>
                </div>
                <div class="card-body">
                    @if ($mobile_model->launch->announced)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Announced</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->launch->announced }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->launch->announced)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Status</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->launch->launch_status }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->launch->launche_other)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4"></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->launch->launche_other }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                </div>
            </div>
        @endif

        {{-- mobile networks --}}
        @if ($mobile_model->network)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Networks</h5>
                </div>
                <div class="card-body">
                    @if ($mobile_model->network->technology)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Technology</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->network->technology }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->network->_2g_bands)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">2G bands</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->network->_2g_bands }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->network->_3g_bands)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">3G bands</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->network->_3g_bands }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->network->_4g_bands)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">4G bands</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->network->_4g_bands }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->network->_5g_bands)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">5G bands</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->network->_5g_bands }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->network->speed)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Speed</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->network->speed }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->network->network_other)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4"></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->network->network_other }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                </div>
            </div>
        @endif

        {{-- mobile body --}}
        @if ($mobile_model->body)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Body</h5>
                </div>
                <div class="card-body">
                    @if ($mobile_model->body->dimensions)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Dimensions</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->body->dimensions }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->body->weight)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Weight</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->body->weight }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->body->weight)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Weight</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->body->weight }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->body->build)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Build</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->body->build }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->body->sim)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">SIM</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->body->sim }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->body->body_other)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4"></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->body->body_other }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                </div>
            </div>
        @endif

        {{-- mobile display --}}
        @if ($mobile_model->display)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Display</h5>
                </div>
                <div class="card-body">
                    @if ($mobile_model->display->display_type)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Type</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->display->display_type }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->display->display_size)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Size</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->display->display_size }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->display->resolution)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Resolution</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->display->resolution }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->display->protection)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Protection</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->display->protection }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->display->display_other)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4"></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->display->display_other }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                </div>
            </div>
        @endif

        {{-- mobile platform --}}
        @if ($mobile_model->platform)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Platform</h5>
                </div>
                <div class="card-body">
                    @if ($mobile_model->platform->os)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">OS</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->platform->os }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->platform->chipset)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Chipset</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->platform->chipset }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->platform->cpu)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">CPU</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->platform->cpu }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->platform->gpu)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">GPU</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->platform->gpu }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->platform->platform_other)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4"></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                                {{ $mobile_model->platform->platform_other }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                </div>
            </div>
        @endif

        {{-- mobile memory --}}
        @if ($mobile_model->memory)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Memory</h5>
                </div>
                <div class="card-body">
                    @if ($mobile_model->memory->card_slot)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Card slot</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->memory->card_slot }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->memory->internal)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Internal</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->memory->internal }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->memory->memory_other)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4"></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->memory->memory_other }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                </div>
            </div>
        @endif


        {{-- mobile main camera --}}
        @if ($mobile_model->mainCamera)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Main Camera</h5>
                </div>
                <div class="card-body">
                    @if ($mobile_model->mainCamera->main_camera_camera)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Camera</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                                {{ $mobile_model->mainCamera->main_camera_camera }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->mainCamera->main_camera_features)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Features</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                                {{ $mobile_model->mainCamera->main_camera_features }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->mainCamera->main_camera_video)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Video</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                                {{ $mobile_model->mainCamera->main_camera_video }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->mainCamera->main_camera_other)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4"></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                                {{ $mobile_model->mainCamera->main_camera_other }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                </div>
            </div>
        @endif

        {{-- mobile selfie camera --}}
        @if ($mobile_model->selfieCamera)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Selfie Cameras</h5>
                </div>
                <div class="card-body">
                    @if ($mobile_model->selfieCamera->selfie_camera_camera)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Camera</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                                {{ $mobile_model->selfieCamera->selfie_camera_camera }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->selfieCamera->selfie_camera_features)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Features</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                                {{ $mobile_model->selfieCamera->selfie_camera_features }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->selfieCamera->selfie_camera_video)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Video</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                                {{ $mobile_model->selfieCamera->selfie_camera_video }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->selfieCamera->selfie_camera_other)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4"></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                                {{ $mobile_model->selfieCamera->selfie_camera_other }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                </div>
            </div>
        @endif

        {{-- mobile sound --}}
        @if ($mobile_model->sound)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Sound</h5>
                </div>
                <div class="card-body">
                    @if ($mobile_model->sound->loudspeaker)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Loudspeaker</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->sound->loudspeaker }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->sound->_3_5mm_jack)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">3.5mm jack</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->sound->_3_5mm_jack }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->sound->sound_other)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4"></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->sound->sound_other }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                </div>
            </div>
        @endif

        {{-- mobile battery --}}
        @if ($mobile_model->battery)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Battery</h5>
                </div>
                <div class="card-body">
                    @if ($mobile_model->battery->battery_type)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Type</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->battery->battery_type }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->battery->charging)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Charging</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->battery->charging }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->battery->battery_other)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4"></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->battery->battery_other }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                </div>
            </div>
        @endif

        {{-- mobile Connectivity --}}
        @if ($mobile_model->connectivity)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Connectivity</h5>
                </div>
                <div class="card-body">
                    @if ($mobile_model->connectivity->wlan)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">WLAN</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->connectivity->wlan }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->connectivity->bluetooth)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Bluetooth</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                                {{ $mobile_model->connectivity->bluetooth }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->connectivity->positioning)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Positioning</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                                {{ $mobile_model->connectivity->positioning }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->connectivity->nfc)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">NFC</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->connectivity->nfc }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->connectivity->radio)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Radio</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->connectivity->radio }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->connectivity->infrared_port)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Infrared Port</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                                {{ $mobile_model->connectivity->infrared_port }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->connectivity->usb)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">USB</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->connectivity->usb }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->connectivity->connectivity_other)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4"></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">
                                {{ $mobile_model->connectivity->connectivity_other }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                </div>
            </div>
        @endif

        {{-- mobile Features --}}
        @if ($mobile_model->feature)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Feature</h5>
                </div>
                <div class="card-body">
                    @if ($mobile_model->feature->sensors)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">Sensors</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->feature->sensors }}</div>
                        </div>
                        <hr class="m-1">
                    @endif
                    @if ($mobile_model->feature->feature_other)
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4"></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 pl-4">{{ $mobile_model->feature->feature_other }}
                            </div>
                        </div>
                        <hr class="m-1">
                    @endif
                </div>
            </div>
        @endif

        {{-- Highlights --}}
        @if ($mobile_model->highlight)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Highlights</h5>
                </div>
                <div class="card-body">
                    {!! $mobile_model->highlight !!}
                </div>
            </div>
        @endif

        {{-- pros and cons --}}
        @if ($mobile_model->pros || $mobile_model->cons)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Advantages and Disadvantages</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 pl-4">
                            <h5><b>Advantages</b></h5>
                            {!! $mobile_model->pros !!}
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 pl-4">
                            <h5><b>Disadvantages</b></h5>
                            {!! $mobile_model->cons !!}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- questions --}}
        @if ($mobile_model->questions)
            <div class="card">
                <div class="card-header bg-light text-center p-1">
                    <h5>Question and Answer</h5>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        {!! $mobile_model->questions !!}
                    </div>
                </div>
            </div>
        @endif

        <div class="alert-warning p-1">
            The information we provided cannot always be 100% correct. That is because of the nature of the information.
            There is always a chance of additional and more accurate information released
            at the moment you are checking out our website. But our team try to do their best and collect data from the
            manufacturer websites and other reputed sources. Please let us know if you find
            any incorrect or misleading information.
        </div>

        <div>
            @if (count($related_models) > 0)
                <h3 class="text-center mt-4">Related Phones</h3>
                <div class="row">
                    @foreach ($related_models as $item)
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 p-1">
                            <div class="card homepage-card">
                                <div class="card-body text-center">
                                    <img class="img-fluid" src="{{ asset('images/model_images/' . $item->model_image) }}"
                                        alt="{{ $item->model_slug }}" width="160">
                                    <h6 class="text-bold mt-1">{{ $item->model_name }}</h6>
                                    <h6 class="mt-3 text-danger">{{ modelPrice($item->prices) }}</h6>
                                    <a href="{{ route('model.name', $item->model_slug) }}"
                                        class="btn btn-info shadow stretched-link">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>

    @push('scripts')
    @endpush
@endsection
