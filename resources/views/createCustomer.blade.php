@extends('layout.mainlayout')

@section('main_content')
    <h1>Create Customer</h1>

    <form action="{{ route('customers.store') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>

        <label for="address">Address:</label>
        <input type="text" name="address" required>
        <br>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" name="phoneNumber" required>
        <br>

        <label for="idCard">ID Card:</label>
        <input type="text" name="idCard" required>
        <br>

        <button type="submit">Create Customer</button>
    </form>
@endsection
