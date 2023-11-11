@extends('layout.mainlayout')

@section('main_content')
    <h1>Show Customer</h1>

    <a>{{ $customers->id }}</a>
    <a>{{ $customers['name'] }}</a>
    <a>{{ $customers['address'] }}</a>
    <a>{{ $customers['phoneNumber'] }}</a>
    <a>{{ $customers['idCard'] }}</a>
@endsection