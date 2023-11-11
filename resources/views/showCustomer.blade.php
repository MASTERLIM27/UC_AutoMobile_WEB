@extends('layout.mainlayout')

@section('main_content')
    <h1>Show Customer</h1>

    <a>{{ $customer->id }}</a>
    <a>{{ $customer['name'] }}</a>
    <a>{{ $customer['address'] }}</a>
    <a>{{ $customer['phoneNumber'] }}</a>
    <a>{{ $customer['idCard'] }}</a>
@endsection