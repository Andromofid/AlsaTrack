<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buc;
use App\Models\Bus;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\BackupGlobals;

use function PHPUnit\Framework\returnCallback;

class AdminBusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buses = Bus::all();
        return view('admin.buses.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.buses.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'n_bus' => 'required|string|max:255|unique:buses,n_bus',
        ]);

        Bus::create($validated);

        return redirect()->route('buses.index')->with('success', 'Bus created successfully.');
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
        $bus = Bus::find($id);
        if ($bus) {
            $bus->stops()->delete();
            $bus->delete();
            return view('admin.buses.index', compact('buses'));
        }
        return back();
    }
}
