<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $days = $request->get('days', 7);
        $commissions = Commission::where('created_at', '>=', now()->subDays($days))->with('affiliate')->where('user_id', auth()->user()->id)->get();
        
        return view('dashboard', ['commissions' => $commissions]);
    }    
}

