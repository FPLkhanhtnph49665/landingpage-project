<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Child;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function index(Request $request)
    {
        $children = Child::query()->where('status','active')->paginate(12);
        return view('frontend.children.index', compact('children'));
    }

    public function show(Child $child)
    {
        return view('frontend.children.show', compact('child'));
    }
}
