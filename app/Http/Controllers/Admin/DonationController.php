<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::with(['user', 'campaign', 'child'])->latest()->paginate(30);

        $totalTransactions = Donation::count();
        $totalAmount = Donation::where('status', 'success')->sum('amount');
        $successCount = Donation::where('status', 'success')->count();
        $failedCount = Donation::where('status', 'failed')->count();

        return view('admin.donations.index', compact(
            'donations',
            'totalTransactions',
            'totalAmount',
            'successCount',
            'failedCount'
        ));
    }

    public function show(Donation $donation)
    {
        $donation->load(['user', 'campaign', 'child']);
        return view('admin.donations.show', compact('donation'));
    }

    public function destroy(Donation $donation)
    {
        $donation->delete();
        return back()->with('success', 'Giao dịch ủng hộ đã được xóa.');
    }
}
