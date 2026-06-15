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
        return redirect()->route('admin.campaigns.index')->with('success', 'Chiến dịch mới đã được tạo.');
    }

    public function show(Campaign $campaign)
    {
        $campaign->load(['children', 'donations.user']);

        $donationsCount = $campaign->donations()->count();
        $donationsTotal = $campaign->donations()->where('status', 'success')->sum('amount');
        $progress = $campaign->target_amount > 0
            ? min(100, ($donationsTotal / $campaign->target_amount) * 100)
            : 0;

        return view('admin.campaigns.show', compact('campaign', 'donationsCount', 'donationsTotal', 'progress'));
    }

    public function edit(Campaign $campaign)
    {
        return view('admin.campaigns.edit', compact('campaign'));
    }

    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        $campaign->update($request->validated());
        return redirect()->route('admin.campaigns.index')->with('success', 'Chiến dịch đã được cập nhật.');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return back()->with('success', 'Chiến dịch đã được xóa.');
    }
}
