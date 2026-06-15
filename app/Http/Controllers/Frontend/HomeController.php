<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Child;

class HomeController extends Controller
{
    public function index()
    {
        $childrenCount = Child::count();
        $campaignsCount = Campaign::count();

        return view('frontend.home', compact('childrenCount', 'campaignsCount'));
    }
}
