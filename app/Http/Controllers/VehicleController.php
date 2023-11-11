<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(){
        return view('vehicle');
    }

    public function store(Request $request){
    }

    public function create()
    {
        return view('createVehicle');
    }
}
