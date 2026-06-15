<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::withTrashed()->paginate(20);
        return view('admin.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.campaigns.create');
    }

    public function store(StoreCampaignRequest $request)
    {
        $data = $request->validated();
        $data['uuid'] = \Illuminate\Support\Str::uuid();
        Campaign::create($data);
        return redirect()->route('admin.campaigns.index');
    }

    public function show(Campaign $campaign)
    {
        return view('admin.campaigns.show', compact('campaign'));
    }

    public function edit(Campaign $campaign)
    {
        return view('admin.campaigns.edit', compact('campaign'));
    }

    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        $campaign->update($request->validated());
        return redirect()->route('admin.campaigns.index');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return back();
    }
}
