<?php

namespace App\Http\Controllers;

use App\Models\Buc;
use App\Models\Stop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class StopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buses = Buc::all(); 
        return view('admin.stops.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $bucs_id = $request->query('bucs_id');
        $bus = Buc::find($bucs_id);
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
            'bucs_id' => 'required|exists:bucs,id',
            'name' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'stop_order' => 'nullable|integer',
            'direction' => 'required|string'
        ]);
        Stop::create([
            'buc_id' => $request->bucs_id,
            'name' => $request->name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'stop_order' => $request->stop_order,
            'direction' => $request->direction
        ]);

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
