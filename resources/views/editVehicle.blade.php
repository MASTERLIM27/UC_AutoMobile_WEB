@extends('layout.mainlayout')

@section('main_content')
    <div class="container">
        <div class="row justify-content-center">
            <h3>Edit Vehicle</h3>

            <!-- Content Row -->
            <div class="">
                <form action="{{ route('vehicles.update', $vehicle->id) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label>Model : </label>
                        <input type="text" class="form-control" name="model" value="{{ $vehicle->model }}" required>
                    </div>
                    <div class="form-group">
                        <label>Year : </label>
                        <input type="number" class="form-control" name="year" value="{{ $vehicle->year }}"required>
                    </div>
                    <div class="form-group">
                        <label>Passenger Capacity : </label>
                        <input type="number" class="form-control" name="passengerCapacity" value="{{ $vehicle->passengerCapacity }}"required>
                    </div>
                    <div class="form-group">
                        <label>Manufacturer : </label>
                        <input type="text" class="form-control" name="manufacturer" value="{{ $vehicle->manufacturer }}"required>
                    </div>
                    <div class="form-group">
                        <label>Price : </label>
                        <input type="number" class="form-control" name="price" value="{{ $vehicle->price }}"equired>
                    </div>

                    <select id="type" name="type" required>
                        @if ($vehicle->type == "car")
                            <option value="car" selected>Car</option>
                        @else
                            <option value="car">Car</option>
                        @endif

                        @if ($vehicle->type == "truck")
                            <option value="truck" selected>Truck</option>
                        @else
                            <option value="truck">Truck</option>
                        @endif

                        @if ($vehicle->type == "motorcycle")
                            <option value="motorcycle" selected>Motorcycle</option>
                        @else
                            <option value="motorcycle">Motorcycle</option>
                        @endif
                    </select>

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
                                    @if ($vehicle->type == "motorcycle")
                                        inputField = 'Cargo Size: <input type="text" id="cargo_size" name="cargo_size"  value="{{ $vehicle->motorcycle->cargo_size }}" required>';
                                        inputField2 = 'Fuel Capacity: <input type="text" id="fuel_capacity" name="fuel_capacity"  value="{{ $vehicle->motorcycle->fuel_capacity }}" required>';
                                    @else
                                        inputField = 'Cargo Size: <input type="text" id="cargo_size" name="cargo_size" required>';
                                        inputField2 = 'Fuel Capacity: <input type="text" id="fuel_capacity" name="fuel_capacity" required>';
                                    @endif
                                } else if (selectedVehicle == 'car') {
                                    @if ($vehicle->type == "car")
                                        inputField = 'Fuel Type: <input type="text" id="fuel_type" name="fuel_type" value="{{ $vehicle->car->fuel_type }}" required>';
                                        inputField2 = 'Trunk Space: <input type="text" id="trunk_space" name="trunk_space" value="{{ $vehicle->car->fuel_type }}" required>';
                                    @else
                                        inputField = 'Fuel Type: <input type="text" id="fuel_type" name="fuel_type" required>';
                                        inputField2 = 'Trunk Space: <input type="text" id="trunk_space" name="trunk_space" required>';
                                    @endif
                                } else if (selectedVehicle == 'truck') {
                                    @if ($vehicle->type == "truck")
                                        inputField = 'Number of Wheels: <input type="text" id="number_of_wheels" name="number_of_wheels" value="{{ $vehicle->truck->number_of_wheels }}" required>';
                                        inputField2 = 'Cargo Area Size: <input type="text" id="cargo_area_size" name="cargo_area_size"  value="{{ $vehicle->truck->cargo_area_size }}" required>';
                                    @else
                                        inputField = 'Number of Wheels: <input type="text" id="number_of_wheels" name="number_of_wheels" required>';
                                        inputField2 = 'Cargo Area Size: <input type="text" id="cargo_area_size" name="cargo_area_size" required>';
                                    @endif
                                }
                        
                                $('#dynamicInput').html(inputField);
                                $('#dynamicInput2').html(inputField2);
                            }).change();
                        }); 
                    </script>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Edit Vehicle</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
