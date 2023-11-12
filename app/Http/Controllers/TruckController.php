<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class TruckController extends Controller
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
            'number_of_wheels' => 'required',
            'cargo_area_size' => 'required|integer',
        ]);
    
        $vehicle = new Vehicle();
        $vehicle->model = $request->input('model');
        $vehicle->year = $request->input('year');
        $vehicle->passengerCapacity = $request->input('passengerCapacity');
        $vehicle->manufacturer = $request->input('manufacturer');
        $vehicle->price = $request->input('price');
        $vehicle->type = $request->input('type');
    
        $vehicle->save();
    
        $truck = new Truck();
        $truck->Motorcycle_ID = $vehicle->id;
        $truck->number_of_wheels = $request->input('number_of_wheels');
        $truck->cargo_area_size = $request->input('cargo_area_size');
        $truck->save();
    
        return redirect(route('vehicles.index'));
    }

    public function show(string $id)
    {

        $truck = Truck::where('Motorcycle_ID', $id)->first();

        if (!$truck) {
            return response()->json(['message' => 'Truck not found'], 404);
        }

        $data = Vehicle::find($id);

        $vehicle = array_merge($truck->toArray(), $data->toArray());

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
        
        Truck::where('Truck_ID', $id)->update([
            'number_of_wheels' => $request->number_of_wheels,
            'cargo_area_size' => $request->cargo_area_size
        ]);

        return response()->json(200);
    }

    public function destroy(string $id)
    {
        Truck::where('Truck_ID', $id)->delete();
        Vehicle::where('id', $id)->delete();


        return response()->json(['message' => 'Vehicle deleted successfully'], 200);
    }
}
