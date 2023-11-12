@extends('layout.mainlayout')

@section('main_content')
<div class="p-5 d-flex align-items-center">
    <h3 class="mr-3">Vehicle</h3>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Add Vehicle</a>
</div>

<h3>Car</h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Model</th>
        <th scope="col">Year</th>
        <th scope="col">Passenger Capacity</th>
        <th scope="col">Manufacturer</th>
        <th scope="col">Price</th>
        <th scope="col">Vehicle Type</th>
        <th scope="col">Fuel Type</th>
        <th scope="col">Trunk Space</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @php $index = 1 @endphp
            @foreach ($vehicles as $vehicle)
                <tr>
                    @php $index++ @endphp

                    @if ($vehicle->car)
                        <td>{{ $vehicle['model'] }}</td>
                        <td>{{ $vehicle['year'] }}</td>
                        <td>{{ $vehicle['passengerCapacity'] }}</td>
                        <td>{{ $vehicle['manufacturer'] }}</td>
                        <td>{{ $vehicle['price'] }}</td>
                        <td>{{ $vehicle['type'] }}</td>
                        <td>{{ $vehicle->car->fuel_type }}</td>
                        <td>{{ $vehicle->car->trunk_space }}</td>

                        <td>
                            <a href="{{ route('vehicles.show' ,$vehicle['id']) }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ route('vehicles.edit' ,$vehicle['id']) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('vehicles.destroy', $vehicle['id']) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $vehicle['id'] }} ?')">Hapus</button>
                            </form>
                        </td>
                    @endif


                </tr>
            @endforeach
    </tbody>
  </table>

  <div class="row justify-content-center">
    <h3>Motorcycle</h3>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Model</th>
                <th scope="col">Year</th>
                <th scope="col">Passenger Capacity</th>
                <th scope="col">Manufacturer</th>
                <th scope="col">Price</th>
                <th scope="col">Vehicle Type</th>
                <th scope="col">Cargo Size</th>
                <th scope="col">Fuel Capacity</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $index = 1 @endphp
            @foreach ($vehicles as $vehicle)
                <tr>
                    @php $index++ @endphp
                    
                    @if ($vehicle->motorcycle)
                        <td>{{ $vehicle['model'] }}</td>
                        <td>{{ $vehicle['year'] }}</td>
                        <td>{{ $vehicle['passengerCapacity'] }}</td>
                        <td>{{ $vehicle['manufacturer'] }}</td>
                        <td>{{ $vehicle['price'] }}</td>
                        <td>{{ $vehicle['type'] }}</td>
                        <td>{{ $vehicle->motorcycle->cargo_size }}</td>
                        <td>{{ $vehicle->motorcycle->fuel_capacity }}</td>

                        <td>
                            <a href="{{ route('vehicles.show' ,$vehicle['id']) }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ route('vehicles.edit' ,$vehicle['id']) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('vehicles.destroy', $vehicle['id']) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $vehicle['id'] }} ?')">Hapus</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="row justify-content-center">
    <h3>Truck</h3>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Model</th>
                <th scope="col">Year</th>
                <th scope="col">Passenger Capacity</th>
                <th scope="col">Manufacturer</th>
                <th scope="col">Price</th>
                <th scope="col">Vehicle Type</th>
                <th scope="col">Number of Wheels</th>
                <th scope="col">Cargo Area Size</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $index = 1 @endphp
            @foreach ($vehicles as $vehicle)
                <tr>
                    @php $index++ @endphp
                    
                    @if ($vehicle->truck)
                        <td>{{ $vehicle['model'] }}</td>
                        <td>{{ $vehicle['year'] }}</td>
                        <td>{{ $vehicle['passengerCapacity'] }}</td>
                        <td>{{ $vehicle['manufacturer'] }}</td>
                        <td>{{ $vehicle['price'] }}</td>
                        <td>{{ $vehicle['type'] }}</td>
                        <td>{{ $vehicle->truck->number_of_wheels }}</td>
                        <td>{{ $vehicle->truck->cargo_area_size }}</td>

                        <td>
                            <a href="{{ route('vehicles.show' ,$vehicle['id']) }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ route('vehicles.edit' ,$vehicle['id']) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('vehicles.destroy', $vehicle['id']) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $vehicle['id'] }} ?')">Hapus</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection