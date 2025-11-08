<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\AvailablePosition;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $career = Career::with('availablePositions')->first();
        $positions = AvailablePosition::with('career')->get();
        
        return view('user.career', compact('career', 'positions'));
    }
}