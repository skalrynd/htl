<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;


class VehicleController extends Controller
{
    function keys(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        if (!$vehicle) {
            abort(404);
        }
        return response()->json($vehicle->keys);
    }
}
