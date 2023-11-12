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
              <label class="input-group-text" for="type">Type</label>
            </div>
            <select class="custom-select" id="type" name="type">
              <option value="motorcycle" selected>Motorcycle</option>
              <option value="car">Car</option>
              <option value="truck">Truck</option>
            </select>
          </div>
        <br>

        <h3>{{request('type')}}</h3>
        
        <div id="dynamicInput">
            <!-- Dynamic input fields will be added here -->
        </div>
        <div id="dynamicInput2">
            <!-- Dynamic input fields will be added here -->
        </div>

        <script>
            $(document).ready(function() {
                $('#type').change(function() {
                    var selectedVehicle = $(this).val();
                    var inputField = '';
                    var inputField2 = '';
            
                    if (selectedVehicle == 'motorcycle') {
                        inputField = 'Cargo Size: <input type="text" id="cargo_size" name="cargo_size">';
                        inputField2 = 'Fuel Capacity: <input type="text" id="fuel_capacity" name="fuel_capacity">';
                    } else if (selectedVehicle == 'car') {
                        inputField = 'Fuel Type: <input type="text" id="fuel_type" name="fuel_type">';
                        inputField2 = 'Trunk Space: <input type="text" id="trunk_space" name="trunk_space">';
                    } else if (selectedVehicle == 'truck') {
                        inputField = 'Number of Wheels: <input type="text" id="number_of_wheels" name="number_of_wheels">';
                        inputField2 = 'Cargo Area Size: <input type="text" id="cargo_area_size" name="cargo_area_size">';
                    }
            
                    $('#dynamicInput').html(inputField);
                    $('#dynamicInput2').html(inputField2);
                }).change();
            });
        </script>

        <button type="submit">Create Vehicle</button>
    </form>
@endsection
