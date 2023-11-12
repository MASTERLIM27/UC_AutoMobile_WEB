<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\Truck;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with(['motorcycle', 'car', 'truck'])->get();
        return view('vehicle', compact('vehicles'));
    }

    public function create()
    {
        return view('createVehicle');
    }

    public function store(Request $request)
    {
        $vehicle = new Vehicle();

        $vehicle->model = $request->input('model');
        $vehicle->year = $request->input('year');
        $vehicle->passengerCapacity = $request->input('passengerCapacity');
        $vehicle->manufacturer = $request->input('manufacturer');
        $vehicle->price = $request->input('price');
        $vehicle->type = $request->input('type');
        
        $vehicle->save();

        if ($request->input('type') == "car"){
            $car = new Car();
            $car->Car_ID = $vehicle->id;
            $car->fuel_type = $request->input('fuel_type');
            $car->trunk_space = $request->input('trunk_space');

            $car->save();
            
        } elseif ($request->input('type') == "motorcycle"){
            $motorcycle = new Motorcycle();
            $motorcycle->Motorcycle_ID = $vehicle->id;
            $motorcycle->cargo_size = $request->input('cargo_size');
            $motorcycle->fuel_capacity = $request->input('fuel_capacity');
        
            $motorcycle->save();
    
        } elseif ($request->input('type') == "truck"){
            $truck = new Truck();
            $truck->Truck_ID = $vehicle->id;
            $truck->number_of_wheels = $request->input('number_of_wheels');
            $truck->cargo_area_size = $request->input('cargo_area_size');
        
            $truck->save();
        }

        return redirect(route('vehicles.index'));
    }

    public function show(string $id)
    {
        $vehicle = Vehicle::with(['motorcycle', 'car', 'truck'])->where('id', $id)->first();
        return view('showVehicle', compact('vehicle'));
    }

    public function edit(string $id)
    {
        $vehicle = Vehicle::with(['motorcycle', 'car', 'truck'])->where('id', $id)->first();
        return view('editVehicle', compact('vehicle'));
    }

    public function update(Request $request, string $id)
    {
        $data = Vehicle::where('id', $id)->first();

        if($request->type == $data->type){
            Vehicle::where('id', $id)->update([
                'model' => $request->model,
                'year' => $request->year,
                'passengerCapacity' => $request->passengerCapacity,
                'manufacturer' => $request->manufacturer,
                'price' => $request->price,
                'type'=> $request->type
            ]);
            
            if ($request->input('type') == "car"){
                Car::where('Car_ID', $id)->update([
                    'Car_ID' => $request->id,
                    'fuel_type' => $request->fuel_type,
                    'trunk_space' => $request->trunk_space,
                ]);
                
            } elseif ($request->input('type') == "motorcycle"){
                Motorcycle::where('Motorcycle_ID', $id)->update([
                    'Motorcycle_ID' => $request->id,
                    'cargo_size' => $request->cargo_size,
                    'fuel_capacity' => $request->fuel_capacity,
                ]);
        
            } elseif ($request->input('type') == "truck"){
                Truck::where('Truck_ID', $id)->update([
                    'Truck_ID' => $request->id,
                    'number_of_wheels' => $request->number_of_wheels,
                    'cargo_area_size' => $request->cargo_area_size,
                ]);
            }

        }else{
            
            
            if ($request->input('type') == "car"){
                if ($data->type == "car"){
                    Car::where('Car_ID', $id)->delete();
                    
                } elseif ($data->type == "motorcycle"){
                    Motorcycle::where('Motorcycle_ID', $id)->delete();
                    
                } elseif ($data->type == "truck"){
                    Truck::where('Truck_ID', $id)->delete();
                }
                Vehicle::where('id', $id)->delete();
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
            } elseif ($request->input('type') == "Motorcycle"){
                if ($data->type == "car"){
                    Car::where('Car_ID', $id)->delete();
                    
                } elseif ($data->type == "motorcycle"){
                    Motorcycle::where('Motorcycle_ID', $id)->delete();
                    
                } elseif ($data->type == "truck"){
                    Truck::where('Truck_ID', $id)->delete();
                }
                Vehicle::where('id', $id)->delete();
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
        
            } elseif ($request->input('type') == "truck"){
                if ($data->type == "car"){
                    Car::where('Car_ID', $id)->delete();
                    
                } elseif ($data->type == "motorcycle"){
                    Motorcycle::where('Motorcycle_ID', $id)->delete();
                    
                } elseif ($data->type == "truck"){
                    Truck::where('Truck_ID', $id)->delete();
                }
                Vehicle::where('id', $id)->delete();
                $vehicle = new Vehicle();
            
                $vehicle->model = $request->input('model');
                $vehicle->year = $request->input('year');
                $vehicle->passengerCapacity = $request->input('passengerCapacity');
                $vehicle->manufacturer = $request->input('manufacturer');
                $vehicle->price = $request->input('price');
                $vehicle->type = $request->input('type');
        
                $vehicle->save();

                $truck = new Truck();

                $truck->Truk_ID = $vehicle->id;
                $truck->number_of_wheels = $request->input('number_of_wheels');
                $truck->cargo_area_size = $request->input('cargo_area_size');
                
                $truck->save();
            }
        }
        return redirect(route('vehicles.index'));
    }

    public function destroy(string $id)
    {
        $data = Vehicle::where('id', $id)->first();
        if ($data->type == "Car"){
            Car::where('Car_ID', $id)->delete();
        } elseif ($data->type == "Motorcycle"){
            Motorcycle::where('Motorcycle_ID', $id)->delete();
        } elseif ($data->Jenis_Kendaraan == "Truk"){
            Truck::where('Truk_ID', $id)->delete();
        }

        Vehicle::where('id', $id)->delete();
        return redirect(route('vehicles.index'));
    }
}
