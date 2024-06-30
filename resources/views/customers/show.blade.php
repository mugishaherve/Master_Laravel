<!-- resources/views/customers/show.blade.php -->

@extends('layouts.app')

@section('content')
<h1>{{ $customer->firstname }} {{ $customer->lastname }}</h1>
<p>Email: {{ $customer->email }}</p>
<p>Address: {{ $customer->address }}</p>
<!-- Add more fields as needed -->
<a href="{{ route('customers.index') }}">Back to Customers List</a>
@endsection