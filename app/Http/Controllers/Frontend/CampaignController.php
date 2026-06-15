<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index(Request $request)
    {
        $campaigns = Campaign::query()->where('status','published')->paginate(12);
        return view('frontend.campaigns.index', compact('campaigns'));
    }

    public function show(Campaign $campaign)
    {
        return view('frontend.campaigns.show', compact('campaign'));
    }
}
