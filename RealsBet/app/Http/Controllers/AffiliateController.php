<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AffiliateController extends Controller
{
    public function index()
    {
        $affiliates = Affiliate::where('user_id', auth()->user()->id)->get();
    
        return view('affiliates.index', compact('affiliates'));
    }

    public function create()
    {
        return view('affiliates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:affiliates,email',
            'status' => 'required|in:ativo,inativo',
        ]);
    
        $user = Auth::user();
    
        $affiliate = Affiliate::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'user_id' => $user->id,
        ]);
    
        Log::info('Afiliado criado: ' . $affiliate->name);
        return redirect()->route('affiliates.index')->with('success', 'Afiliado criado com sucesso!');
    }
    
    

    public function destroy($id)
    {
        $affiliate = Affiliate::find($id);
        $affiliate->delete();
    
        return redirect()->route('affiliates.index')->with('success', 'Afiliado removido com sucesso.');
    }

    public function updateStatus(Request $request, $id)
    {
        $affiliate = Affiliate::find($id);
        
        $request->validate([
            'status' => 'required|in:ativo,inativo',
        ]);
    
        $affiliate->status = $request->status;
        $affiliate->save();
        
        return redirect()->route('affiliates.index')->with('success', 'Afiliado removido com sucesso.');
    }
}
