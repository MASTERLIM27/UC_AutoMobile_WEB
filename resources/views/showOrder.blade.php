@extends('layout.mainlayout')

@section('main_content')
    <h1>Show Order</h1>

    <a>{{ $order->id }}</a>

    @forelse ($customers as $customer)
       @if ($customer['id'] == $order['Customer_ID'])
            <a>{{ $customer['name'] }}</a>
       @endif
        @empty
    @endforelse
    <a>{{ $order['Vehicle_ID'] }}</a>
    <a>{{ $order['total_price'] }}</a>
@endsection