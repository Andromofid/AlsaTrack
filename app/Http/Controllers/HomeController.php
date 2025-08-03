<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->bus) {
            $bus = $request->bus;
            $buses = Bus::where('n_bus', 'like', '%' . $request->bus . '%')->get();
            if ($buses->isEmpty()) {
                return redirect()->route('home')->with('error', 'Bus non trouvé.');
            }
            // Add a flag to indicate scroll is needed
            return view('home', compact('buses', 'bus'))->with('scroll', true);
        }
        $buses = Bus::all();
        return view('home', compact('buses'));
    }
}
