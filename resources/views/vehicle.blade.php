@extends('layout.mainlayout')

@section('main_content')
<div class="p-5 d-flex align-items-center">
    <h1 class="mr-3">Vehicle</h1>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Add Vehicle</a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Cutomer</th>
        <th scope="col">Vehicle</th>
        <th scope="col">Total Price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        
    </tbody>
  </table>
@endsection