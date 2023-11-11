@extends('layout.mainlayout')

@section('main_content')
    <h1>Create Order</h1>

    <form action="{{ route('orders.store') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Customer</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01">
              <option selected>Select Customer</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        <br>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect02">Vehicle</label>
            </div>
            <select class="custom-select" id="inputGroupSelect02">
              <option selected>Select Vehicle</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        <br>

        <label for="totalPrice">Total Price:</label>
        <input type="text" name="totalPrice" required>
        <br>

        <button type="submit">Create Order</button>
    </form>
@endsection
