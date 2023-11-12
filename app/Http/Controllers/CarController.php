<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class CarController extends Controller
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
            'fuel_type' => 'required',
            'trunk_space' => 'required|integer',
        ]);
    
        $vehicle = new Vehicle();
        $vehicle->model = $request->input('model');
        $vehicle->year = $request->input('year');
        $vehicle->passengerCapacity = $request->input('passengerCapacity');
        $vehicle->manufacturer = $request->input('manufacturer');
        $vehicle->price = $request->input('price');
        $vehicle->type = $request->input('type');
    
        $vehicle->save();
    
        $car = new Car();
        $car->Car_ID = $vehicle->id;
        $car->fuel_type = $request->input('fuel_type');
        $car->trunk_space = $request->input('trunk_space');
        $car->save();
    
        return redirect(route('vehicles.index'));
    }

    public function show(string $id)
    {
        $car = Car::where('Car_ID', $id)->first();

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $data = Vehicle::find($id);

        $vehicle = array_merge($car->toArray(), $data->toArray());

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
        
        Car::where('Car_ID', $id)->update([
            'fuel_type' => $request->fuel_type,
            'trunk_space' => $request->trunk_space
        ]);

        return response()->json(200);
    }

    public function destroy(string $id)
    {
        Car::where('Car_ID', $id)->delete();
        Vehicle::where('id', $id)->delete();


        return response()->json(['message' => 'Vehicle deleted successfully'], 200);
    }
}
