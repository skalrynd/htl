<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\Order;
use App\Models\Technician;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['vehicle', 'key', 'technician'])->get();
        return response()->json($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = Vehicle::orderBy('make', 'asc')->orderBy('model', 'asc')->orderBy('year', 'asc')->get();
        $technicians = Technician::orderBy('last_name')->get();
        return view('order.create-form', ['vehicles'=>$vehicles, 'technicians'=>$technicians]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle'   => 'required|numeric',
            'key'       => 'required|numeric',
            'technician'=> 'required|numeric'
        ]);

        $vehicle = Vehicle::find($request->get('vehicle'));
        $key = Key::find($request->get('key'));
        $technician = Technician::find($request->get('technician'));

        if (empty($vehicle) || empty($key) || empty($technician)) {
            abort(404, 'essential model not found.  Cannot process');
        }

        //Else let's insert an order
        $order = new Order();
        $order->vehicle()->associate($vehicle);
        $order->key()->associate($key);
        $order->technician()->associate($technician);
        $order->save();

        //Just redirect them to index here.
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if (empty($order)) {
            abort(404, 'Order id '.$id.' does not exist');
        }

        $order->delete();
    }
}
