<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Adv;
use App\Models\Banner;
use App\Models\BottomSectionHome;
use App\Models\Brand;
use App\Models\Event;
use App\Models\PublicSession;
use App\Models\Service;
use App\Models\Projects;
use App\Models\Setting;
use App\Models\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::get();
        $locale = app()->getLocale();
        $setting = Setting::first();
        return view('user.about',compact('abouts','locale','setting'));
    }
    
   


}