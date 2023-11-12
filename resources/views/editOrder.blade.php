@extends('layout.mainlayout')

@section('main_content')
    <h1>Edit Order</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('orders.update', "1") }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Customer</label>
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
              <label class="input-group-text" for="inputGroupSelect02">Vehicle</label>
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
        <input type="text" name="total_price"  value={{ $order['total_price'] }} required>
        <br>

        <button type="submit">Update Customer</button>
    </form>
@endsection