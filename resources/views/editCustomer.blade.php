@extends('layout.mainlayout')

@section('main_content')
    <h1>Edit Customer</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('customers.update', "1") }}" method="post">
        @csrf
        @method('put')

        <label for="name">Name:</label>
        <input type="text" name="name" value={{ $customers['name'] }} required>
        <br>

        <label for="address">Address:</label>
        <input type="text" name="address" value={{ $customers['address'] }} required>
        <br>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" name="phoneNumber" value={{ $customers['phoneNumber'] }} required>
        <br>

        <label for="idCard">ID Card:</label>
        <input type="text" name="idCard" value={{ $customers['idCard'] }} required>
        <br>
        <button type="submit">Update Customer</button>
    </form>
@endsection