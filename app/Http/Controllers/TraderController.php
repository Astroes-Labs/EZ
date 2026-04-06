<?php


namespace App\Http\Controllers;

use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TraderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $traders = Trader::all();
        $copiedTraders = $user->traders->pluck('id')->toArray();

        return view('layouts.app.traders.index', compact('traders', 'copiedTraders'));
    }


   /*  public function index()
    {
        $user = Auth::user(); // Get the logged-in user
    
        // Fetch all traders
        $traders = Trader::all();
    
        // Split traders into copied and not copied
        $copiedTraders = $traders->whereIn('id', $user->traders->pluck('id')->toArray());
        $notCopiedTraders = $traders->whereNotIn('id', $user->traders->pluck('id')->toArray());
    
        // Return the view with both lists
        return view('dashboard.dynamic.traders.index', compact('copiedTraders', 'notCopiedTraders'));
    } */
     

    public function copy(Request $request, Trader $trader)
    {
        $user = Auth::user();
        $user->traders()->attach($trader->id);

        return response()->json(['message' => 'Trader copied successfully.']);
    }

    public function cancel(Request $request, Trader $trader)
    {
        $user = Auth::user();
        $user->traders()->detach($trader->id);

        return response()->json(['message' => 'Copy canceled successfully.']);
    }
}
