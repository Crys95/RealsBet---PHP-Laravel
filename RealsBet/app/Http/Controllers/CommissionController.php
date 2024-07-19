<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Affiliate;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function create()
    {
        $affiliates = Affiliate::all();
        return view('commissions.create', compact('affiliates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'affiliate_id' => 'required|exists:affiliates,id',
            'date' => 'required|date',
            'value' => 'required|numeric|min:0',
        ]);
    
        $commission = Commission::create([
            'affiliate_id' => $request->affiliate_id,
            'date' => $request->date,
            'value' => $request->value,
        ]);
    
        return redirect()->route('commissions.index')->with('success', 'Comissão adicionada com sucesso!');
    }

    public function index()
    {
        $commissions = Commission::all();
    
        return view('commissions.index', ['commissions' => $commissions]);
    }
}
