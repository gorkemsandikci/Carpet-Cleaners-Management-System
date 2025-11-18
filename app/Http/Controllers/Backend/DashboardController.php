<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Customer;
use App\Models\Gallery;
use App\Models\HomepageContent;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $companyId = Auth::user()->company_id;

        // Statistics
        $totalCustomers = Customer::where('company_id', $companyId)->count();
        $totalServices = Service::where('company_id', $companyId)->count();
        $totalGalleryItems = Gallery::where('company_id', $companyId)->count();
        $totalMessages = ContactMessage::where('company_id', $companyId)->count();
        $unreadMessages = ContactMessage::where('company_id', $companyId)->where('status', 'unread')->count();
        $activeServices = Service::where('company_id', $companyId)->where('status', '1')->count();

        // Recent customers
        $recentCustomers = Customer::where('company_id', $companyId)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Recent messages
        $recentMessages = ContactMessage::where('company_id', $companyId)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Monthly customer statistics (last 6 months)
        $monthlyCustomers = Customer::where('company_id', $companyId)
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as count'))
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Service status distribution
        $serviceStatus = Service::where('company_id', $companyId)
            ->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();

        return view('backend.pages.index', compact(
            'totalCustomers',
            'totalServices',
            'totalGalleryItems',
            'totalMessages',
            'unreadMessages',
            'activeServices',
            'recentCustomers',
            'recentMessages',
            'monthlyCustomers',
            'serviceStatus'
        ));
    }
}
