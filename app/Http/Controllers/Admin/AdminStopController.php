<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Stop;
use Illuminate\Http\Request;

class AdminStopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buses = Bus::all(); 
        return view('admin.stops.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $bus_id = $request->query('bus_id');
        $bus = Bus::find($bus_id);
        if ($bus) {
            return view('admin.stops.create', compact('bus'));
        } else {
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'name' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'stop_order' => 'nullable|integer',
            'direction' => 'required|string'
        ]);
        // dd($data['bus_id']);
        Stop::create($data);

        return redirect()->back()->with('success', 'Stop added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stop = Stop::find($id);
        if ($stop) {
            $stop->delete();
            return redirect()->back()->with('success', 'Stop delete successfully!');
        } else {
            return back();
        }
    }
}
