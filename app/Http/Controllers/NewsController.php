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

     public function show($id)
    {
        $news = News::findOrFail($id);
        $locale = app()->getLocale();
        
        // Get related news (same year or recent news, excluding current)
        $relatedNews = News::where('id', '!=', $id)
            ->where(function($query) use ($news) {
                $query->whereYear('date_of_news', \Carbon\Carbon::parse($news->date_of_news)->year)
                      ->orWhere('date_of_news', '>=', \Carbon\Carbon::now()->subMonths(6));
            })
            ->orderBy('date_of_news', 'desc')
            ->limit(3)
            ->get();
        
        return view('user.new-details', compact('news', 'locale', 'relatedNews'));
    }

}