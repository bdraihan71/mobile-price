<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MobileBrand;
use App\Models\MobileModel;
use Illuminate\Support\Facades\Session;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function home()
    {
        $models = MobileModel::query()
                ->select('id', 'model_name', 'model_slug', 'model_image')
                ->with('prices')->where('is_published', true)
                ->latest('published_at')->paginate(24);

        // Seo 
        SEOMeta::setTitle("Mobile Phone Price in Bangladesh 2024 | mobilekhor.com");
        SEOMeta::setDescription("mobilekhor.com - find new and latest mobile phone, smartphone, feature phone etc. official and unoffiacal price in Bangladesh 2024.");
        SEOMeta::setCanonical(URL::full());
        SEOMeta::addKeyword(['mobilekhor', 'mobile price in bangladesh', 'mobile price in bd']);
        SEOMeta::setRobots("index, follow");

        OpenGraph::setTitle('Mobile Phone Price in Bangladesh 2024 | mobilekhor.com');
        OpenGraph::setDescription('mobilekhor.com - find new and latest mobile phone, smartphone, feature phone etc. official and unoffiacal price in Bangladesh 2024.');
        OpenGraph::setUrl(URL::full());
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('site_name', 'mobilekhor.com');
        OpenGraph::addImage(url()->current().'/images/logo.png');

        JsonLd::setTitle("Mobile Phone Price in Bangladesh 2024 | mobilekhor.com");
        JsonLd::setDescription('mobilekhor.com - find new and latest mobile phone, smartphone, feature phone etc. official and unoffiacal price in Bangladesh 2024.');
        JsonLd::setType('website');
        JsonLd::addImage(url()->current().'/images/logo.png');


        return view('frontend.pages.home')->with([
            'models' => $models
        ]);
    }

    public function brand()
    {
        $brands = MobileBrand::orderBy('visitor_count', 'DESC')->get();

        // Seo 
        SEOMeta::setTitle("Mobile phones all brands | Mobile all brand price in bd");
        SEOMeta::setDescription("Official all mobile brand list and price in bd. All new Gaming  Mobile Prices in Bangladesh. Best Chinese phones List 2024.");
        SEOMeta::setCanonical( url()->current() );
        SEOMeta::addKeyword(['Mobile phones brands', 'mobile price in bangladesh', 'mobile price in bd']);
        SEOMeta::setRobots("index, follow");

        OpenGraph::setTitle('Mobile phones all brands | Mobile all brand price in bd');
        OpenGraph::setDescription('Official all mobile brand list and price in bd. All new Gaming  Mobile Prices in Bangladesh. Best Chinese phones List 2024.');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('site_name', 'mobilekhor.com');
        OpenGraph::addImage('https://mobilekhor.com/images/logo.png');

        JsonLd::setTitle("Mobile phones all brands | Mobile all brand price in bd");
        JsonLd::setDescription('Official all mobile brand list and price in bd. All new Gaming  Mobile Prices in Bangladesh. Best Chinese phones List 2024.');
        JsonLd::setType('website');
        JsonLd::addImage('https://mobilekhor.com/images/logo.png');

        return view('frontend.pages.brand')->with([
            "brands" => $brands
        ]);
    }

    public function brandByName($brand)
    {
        $brand = MobileBrand::where('brand_slug', $brand)->first();
        $models = MobileModel::with('prices')->where('mobile_brand_id', $brand->id)
                    ->where('is_published', true)->orderBy('published_at', 'DESC')->paginate(24);
        
        $brand_key = 'brand_'. $brand->id;
        if(!Session::has($brand_key)){
            $brand->increment('visitor_count');
            Session::put($brand_key, 'brand_'. $brand->id);
        }


        // Seo 
        SEOMeta::setTitle($brand->brand_title);
        SEOMeta::setDescription($brand->brand_description);
        SEOMeta::setCanonical( URL::full() );
        SEOMeta::addKeyword([$brand->brand_Keyword]);
        SEOMeta::setRobots("index, follow");
 
        OpenGraph::setTitle($brand->brand_title);
        OpenGraph::setDescription($brand->brand_description);
        OpenGraph::setUrl(URL::full());
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('site_name', 'mobilekhor.com');
        OpenGraph::addImage(url('') . '/images/brand_images/' . $brand->brand_image);
 
        JsonLd::setTitle($brand->brand_title);
        JsonLd::setDescription($brand->brand_description);
        JsonLd::setType('website');
        JsonLd::addImage(url('') . '/images/brand_images/' . $brand->brand_image);

        return view('frontend.pages.home')->with([
            'models' => $models
        ]);
    }

    public function priceRange($price_slug)
    {
        $price = explode('-', $price_slug);
        $lower_price =  (int)$price[0];
        $higher_price = (int)$price[1];

        $models = MobileModel::with('prices')->whereIn('id', function($query) use($lower_price, $higher_price){
                $query->select('mobile_model_id')
                ->from('prices')
                ->whereBetween('price', [$lower_price, $higher_price])
                ->distinct();
        })->where('is_published', true)
        ->orderBy('published_at', 'DESC')->paginate(24);

        // Seo 
        SEOMeta::setTitle($lower_price - 1  ." to " . $higher_price . " Taka Mobile Price in Bangladesh 2024");
        SEOMeta::setDescription("Best Mobile Phones from " . ($lower_price - 1)   . " under " . $higher_price . " Taka in Bangladesh 2024. Best phone under " . $higher_price . " taka in Bangladesh.");
        SEOMeta::setCanonical(URL::full());
        SEOMeta::addKeyword(['Mobile Phone Price Range', 'mobile price in bangladesh', 'Mobile Phones']);
        SEOMeta::setRobots("index, follow");

        OpenGraph::setTitle($lower_price - 1  ." to " . $higher_price . " Taka Mobile Price in Bangladesh 2024");
        OpenGraph::setDescription("Best Mobile Phones from " . ($lower_price - 1)   . " under " . $higher_price . " Taka in Bangladesh 2024. Best phone under " . $higher_price . " taka in Bangladesh.");
        OpenGraph::setUrl(URL::full());
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('site_name', 'mobilekhor.com');
        OpenGraph::addImage('https://mobilekhor.com/images/logo.png');

        JsonLd::setTitle($lower_price - 1  ." to " . $higher_price . " Taka Mobile Price in Bangladesh 2024");
        JsonLd::setDescription("Best Mobile Phones from " . ($lower_price - 1)   . " under " . $higher_price . " Taka in Bangladesh 2024. Best phone under " . $higher_price . " taka in Bangladesh.");
        JsonLd::setType('website');
        JsonLd::addImage('https://mobilekhor.com/images/logo.png');

        return view('frontend.pages.home')->with([
            'models' => $models
        ]);
    }

    public function modelByName($model_slug)
    {
        $mobile_model = MobileModel::where('model_slug', $model_slug)->where('is_published', true)->first();
        $model_key = 'model_'. $mobile_model->id;
        $related_models = MobileModel::where('mobile_brand_id', $mobile_model->mobile_brand_id)
                        ->where('is_published', true)
                        ->where('id', '!=', $mobile_model->id)
                        ->orderBy('visitor_count', 'DESC')
                        ->paginate(8);

        if(!Session::has($model_key)){
            $mobile_model->increment('visitor_count');
            Session::put($model_key, 'model_'. $mobile_model->id);
        }

        // Seo 
        SEOMeta::setTitle($mobile_model->model_title);
        SEOMeta::setDescription($mobile_model->model_description);
        SEOMeta::setCanonical( URL::full() );
        SEOMeta::addKeyword([$mobile_model->model_Keyword]);
        SEOMeta::setRobots("index, follow");
 
        OpenGraph::setTitle($mobile_model->model_title);
        OpenGraph::setDescription($mobile_model->model_description);
        OpenGraph::setUrl(URL::full());
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('site_name', 'mobilekhor.com');
        OpenGraph::addImage(url('') . '/images/model_images/' . $mobile_model->model_image);
 
        JsonLd::setTitle($mobile_model->model_title);
        JsonLd::setDescription($mobile_model->model_description);
        JsonLd::setType('website');
        JsonLd::addImage(url('') . '/images/model_images/' . $mobile_model->model_image);


        return view('frontend.pages.single_mobile')->with([
            'mobile_model' => $mobile_model,
            'related_models' => $related_models
        ]);
    }

    public function mobileSearch($search)
    {
        $mobile_models =  MobileModel::where('model_name', 'LIKE', "%$search%")->where('is_published', true)
                          ->orderBy('visitor_count', 'DESC')->take(7)->get();
                                        
        return view('frontend.partials.search_result')->with([
            'mobile_models' => $mobile_models
        ]);
    }

    public function about()
    {
        return view('frontend.pages.about');
    }
    
    public function privacyPolicy()
    {
        return view('frontend.pages.privacy');
    }
}