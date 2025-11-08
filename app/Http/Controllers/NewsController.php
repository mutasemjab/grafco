<?php

namespace App\Http\Controllers;
use App\Models\Consumable;
use App\Models\News;
use App\Models\Setting;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('date_of_news', 'desc')->get();
        $locale = app()->getLocale();
        $setting = Setting::first();
        
        return view('user.news', compact('news', 'locale', 'setting'));
    }

}