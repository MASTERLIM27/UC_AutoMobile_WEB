<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'model' => 'required',
            'year' => 'required|integer',
            'passengerCapacity' => 'required|integer',
            'manufacturer' => 'required',
            'price' => 'required|integer',
            'type' => 'required',
            'cargo_size' => 'required',
            'fuel_capacity' => 'required|integer',
        ]);
    
        $vehicle = new Vehicle();
        $vehicle->model = $request->input('model');
        $vehicle->year = $request->input('year');
        $vehicle->passengerCapacity = $request->input('passengerCapacity');
        $vehicle->manufacturer = $request->input('manufacturer');
        $vehicle->price = $request->input('price');
        $vehicle->type = $request->input('type');
    
        $vehicle->save();
    
        $motorcycle = new Motorcycle();
        $motorcycle->Motorcycle_ID = $vehicle->id;
        $motorcycle->cargo_size = $request->input('cargo_size');
        $motorcycle->fuel_capacity = $request->input('fuel_capacity');
        $motorcycle->save();
    
        return redirect(route('vehicles.index'));
    }

    public function show(string $id)
    {

        $motorcycle = Motorcycle::where('Motorcycle_ID', $id)->first();

        if (!$motorcycle) {
            return response()->json(['message' => 'Motorcycle not found'], 404);
        }

        $data = Vehicle::find($id);

        $vehicle = array_merge($motorcycle->toArray(), $data->toArray());

        return view('vehicle', compact('vehicle'));
    }

    public function update(Request $request, string $id)
    {
        
        Vehicle::where('id', $id)->update([            
            'model' => $request->model,
            'year' => $request->year,
            'passengerCapacity' => $request->passengerCapacity,
            'manufacturer' => $request->manufacturer,
            'price' => $request->price,
            'type' => $request->type
        ]);
        
        Motorcycle::where('Motorcycle_ID', $id)->update([
            'cargo_size' => $request->cargo_size,
            'fuel_capacity' => $request->fuel_capacity
        ]);

        return response()->json(200);
    }

    public function destroy(string $id)
    {
        Motorcycle::where('Car_ID', $id)->delete();
        Vehicle::where('id', $id)->delete();


        return response()->json(['message' => 'Vehicle deleted successfully'], 200);
    }
}
