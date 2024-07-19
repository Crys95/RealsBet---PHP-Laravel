<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $affiliates = Affiliate::where('user_id', auth()->user()->id)->get();
    
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
            'user_id' => auth()->user()->id,
        ]);
    
        return redirect()->route('commissions.index')->with('success', 'Comissão adicionada com sucesso!');
    }

    public function index()
    {
        $commissions = Commission::with('affiliate')->where('user_id', auth()->user()->id)->get();
    
        return view('commissions.index', compact('commissions'));
    }

    public function destroy($id)
    {
        $commission = Commission::findOrFail($id);
        $commission->delete();

        return redirect()->route('commissions.index')->with('success', 'Comissão removida com sucesso!');
    }
}
