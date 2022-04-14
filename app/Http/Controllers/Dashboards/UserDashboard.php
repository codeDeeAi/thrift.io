<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboard extends Controller
{
    // Show User Dashboard
    public function index(Request $request)
    {
        return view('user.overview.dashboard');
    }
}
