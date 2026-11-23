<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.admin-dashboard', [
            'totalRegistrations' => Registration::count(),
            'pendingRegistrations' => Registration::where('status', 'pending')->count(),
            'acceptedRegistrations' => Registration::where('status', 'accepted')->count(),
            'rejectedRegistrations' => Registration::where('status', 'rejected')->count(),
        ]);
    }
}
