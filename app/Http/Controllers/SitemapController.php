<?php

namespace App\Http\Controllers;

use App\Models\MobileBrand;
use App\Models\MobileModel;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = MobileModel::where('is_published', true)->latest('created_at')->get();
        $brands = MobileBrand::orderBy('visitor_count', 'DESC')->get();
        $pages = [
            'https://mobilekhor.com/brand',
            'https://mobilekhor.com/contact',
            'https://mobilekhor.com/about',
            'https://mobilekhor.com/privacy_policy',
        ];

        $prices = [
            'https://mobilekhor.com/price-range/1-5000',
            'https://mobilekhor.com/price-range/5001-10000',
            'https://mobilekhor.com/price-range/10001-15000',
            'https://mobilekhor.com/price-range/15001-20000',
            'https://mobilekhor.com/price-range/20001-25000',
            'https://mobilekhor.com/price-range/25001-30000',
            'https://mobilekhor.com/price-range/30001-40000',
            'https://mobilekhor.com/price-range/40001-50000',
            'https://mobilekhor.com/price-range/50001-60000',
            'https://mobilekhor.com/price-range/60001-80000',
            'https://mobilekhor.com/price-range/80001-100000',
            'https://mobilekhor.com/price-range/100001-1000000'
        ];
        
        return response()->view('sitemap', [
            'pages' => $pages,
            'brands' => $brands,
            'prices' => $prices,
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
    }
}
