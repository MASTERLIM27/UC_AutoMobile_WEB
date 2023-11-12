@extends('layout.mainlayout')

@section('main_content')

<div class="p-5 d-flex align-items-center">
    <h3 class="mr-3">Orders</h3>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Add Order</a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Customer</th>
        <th scope="col">Vehicle</th>
        <th scope="col">Total Price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($orders as $order)
            <tr>
                <td>{{ $order['id'] }}</td>
                <td>{{ $order['Customer_ID'] }}</td>
                <td>{{ $order['Vehicle_ID'] }}</td>
                <td>{{ $order['total_price'] }}</td>
                <td>
                    <a href="{{ route('orders.show' ,$order['id']) }}" class="btn btn-sm btn-info">Detail</a>
                    <a href="{{ route('orders.edit' ,$order['id']) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('orders.destroy', $order['id']) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $order['id'] }} ?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
        @endforelse
    </tbody>
  </table>
@endsection