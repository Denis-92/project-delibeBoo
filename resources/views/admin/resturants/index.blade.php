@extends('layouts.dashboard')

@section('content')
    @foreach ($resturants as $resturant)
        <p>{{ $resturant->name }}</p>
    @endforeach
@endsection
