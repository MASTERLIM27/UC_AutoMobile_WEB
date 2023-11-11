@extends('layout.mainlayout')

@section('main_content')
    <h1>Create Vehicle</h1>

    <form action="{{ route('vehicles.store') }}" method="post">
        @csrf

        <label for="model">Model:</label>
        <input type="text" name="model" required>
        <br>

        <label for="year">Year:</label>
        <input type="text" name="year" required>
        <br>

        <label for="passengerCapacity">Passenger Capacity:</label>
        <input type="text" name="passengerCapacity" required>
        <br>

        <label for="manufacturer">Manufacturer:</label>
        <input type="text" name="manufacturer" required>
        <br>

        <label for="price">Price:</label>
        <input type="text" name="price" required>
        <br>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputType">Type</label>
            </div>
            <select class="custom-select" id="inputType" name="inputType">
              <option value="1">Motorcycle</option>
              <option value="2">Car</option>
              <option value="3">Truck</option>
            </select>
          </div>
        <br>

        <h3>{{request('inputType')}}</h3>

        @if (request('inputType') == "1")
            <label for="cargo_size">Cargo Size:</label>
            <input type="text" name="cargo_size" required>
            <br>

            <label for="fuel_capacity">Fuel Capacity:</label>
            <input type="text" name="fuel_capacity" required>
            <br>
        @endif

        <button type="submit">Create Vehicle</button>
    </form>
@endsection
