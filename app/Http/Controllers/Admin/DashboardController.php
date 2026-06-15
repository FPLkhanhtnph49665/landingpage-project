<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Child;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $childrenCount = Child::count();
        $campaignsCount = Campaign::count();
        $donationsCount = Donation::count();
        $totalDonation = Donation::where('status', 'success')->sum('amount');
        $donorsCount = User::whereHas('donations')->count();
        $volunteersCount = User::role('volunteer')->count();

        $monthlyData = Donation::where('status', 'success')
            ->selectRaw("DATE_FORMAT(paid_at, '%Y-%m') as period, SUM(amount) as total")
            ->groupBy('period')
            ->orderBy('period')
            ->get();

        $yearlyData = Donation::where('status', 'success')
            ->selectRaw("YEAR(paid_at) as period, SUM(amount) as total")
            ->groupBy('period')
            ->orderBy('period')
            ->get();

        $topCampaigns = Campaign::withCount(['donations as total_received' => function ($query) {
            $query->where('status', 'success');
        }])
            ->orderByDesc('total_received')
            ->limit(6)
            ->get();

        $childrenSupported = Child::whereHas('donations')->count();

        return view('admin.dashboard', compact(
            'childrenCount',
            'campaignsCount',
            'donationsCount',
            'totalDonation',
            'donorsCount',
            'volunteersCount',
            'monthlyData',
            'yearlyData',
            'topCampaigns',
            'childrenSupported'
        ));
    }
}
