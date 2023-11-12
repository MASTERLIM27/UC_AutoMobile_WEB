@extends('layout.mainlayout')

@section('main_content')
    <h1>Show Vehicle</h1>

    <a>{{ $vehicle->id }}</a>
    <a>{{ $vehicle['model'] }}</a>
    <a>{{ $vehicle['year'] }}</a>
    <a>{{ $vehicle['passengerCapacity'] }}</a>
    <a>{{ $vehicle['manufacturer'] }}</a>
    <a>{{ $vehicle['price'] }}</a>
    <a>{{ $vehicle['type'] }}</a>
    
    @if ($vehicle->motorcycle)
        <a>{{ $vehicle['cargo_size'] }}</a>
        <a>{{ $vehicle['fuel_capacity'] }}</a>
    @endif

    @if ($vehicle->car)
        <a>{{ $vehicle['fuel_type'] }}</a>
        <a>{{ $vehicle['trunk_space'] }}</a>
    @endif

    @if ($vehicle->truck)
        <a>{{ $vehicle['number_of_wheels'] }}</a>
        <a>{{ $vehicle['cargo_area_size'] }}</a>
    @endif

@endsection