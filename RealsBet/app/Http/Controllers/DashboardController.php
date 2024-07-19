<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $days = $request->get('days', 7);
        $commissions = Commission::where('created_at', '>=', now()->subDays($days))->with('affiliate')->get();
        
        return view('dashboard', ['commissions' => $commissions]);
    }    
}

