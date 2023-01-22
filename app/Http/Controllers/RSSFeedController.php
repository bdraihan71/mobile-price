<?php

namespace App\Http\Controllers;

use App\Models\MobileModel;
use Illuminate\Http\Request;

class RSSFeedController extends Controller
{
    public function index()
    {
        $posts = MobileModel::where('is_published', true)->latest('created_at')->get();
  
        return response()->view('rss', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
    }
}
