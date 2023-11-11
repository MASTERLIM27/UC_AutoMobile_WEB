@extends('layout.mainlayout')

@section('main_content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Id Card</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($customers['customers'] as $customer)
            <tr>
                <td>{{ $customer['id'] }}</td>
                <td>{{ $customer['name'] }}</td>
                <td>{{ $customer['address'] }}</td>
                <td>{{ $customer['phoneNumber'] }}</td>
                <td>{{ $customer['idCard'] }}</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">Detail</a>
                    <a href="{{ route('customers.edit' ,$customer['id']) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('customers.destroy', $customer['id']) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $customer['name'] }} ?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">Tidak ada </td>
            </tr>
        @endforelse
    </tbody>
  </table>
@endsection