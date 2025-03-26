<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\BusLocationUpdated; // ✅ Make sure this import is correct
use App\Models\Buc;

class BusTrackingController extends Controller
{
    public function index($id)
    {
        $bus = Buc::find($id);

        return view('tracking', compact('bus'));
    }
    public function updateLocation(Request $request)
    {
        $busId = $request->bus_id;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        // Dispatch the event
        event(new BusLocationUpdated($busId, $latitude, $longitude));
        // dd($busId."".$latitude."".$longitude);
        return response()->json(['status' => 'Location updated']);
    }
}
