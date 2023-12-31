@extends('layout.mainlayout')

@section('main_content')
    <h1>Create Order</h1>

    <form action="{{ route('orders.store') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="Customer_ID">Customer</label>
            </div>
            <select class="custom-select" id="Customer_ID" name="Customer_ID">
                @forelse ($customers as $customer)
                    <option value={{ $customer['id'] }}>{{ $customer['name'] }}</option>
                    @empty
                @endforelse
            </select>
          </div>
        <br>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="Vehicle_ID">Vehicle</label>
            </div>
            <select class="custom-select" id="Vehicle_ID" name="Vehicle_ID">
                @forelse ($vehicles as $vehicle)
                <option value={{ $vehicle['id'] }}>{{ $vehicle['model'] }}</option>
                @empty
            @endforelse
            </select>
          </div>
        <br>

        <label for="total_price">Total Price:</label>
        <input type="text" name="total_price" required>
        <br>

        <button type="submit">Create Order</button>
    </form>
@endsection
