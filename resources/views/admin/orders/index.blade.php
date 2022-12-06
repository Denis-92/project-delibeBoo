@extends('layouts.app')

@section('content')

<div>
    <h1>LISTA ORDINI:</h1>
    @foreach ($orders as $order)

    <div>
        <a href="{{route('admin.orders.show', $order->id)}}">{{ $order->total_price}}</a>
        <a href="{{route('admin.orders.show', $order->id)}}">{{ $order->date}}</a>
        <a href="{{route('admin.orders.show', $order->id)}}">{{ $order->address}}</a>
        <a href="{{route('admin.orders.show', $order->id)}}">{{ $order->pieces}}</a>
        <a href="{{route('admin.orders.show', $order->id)}}">{{ $order->email}}</a>
        <a href="{{route('admin.orders.show', $order->id)}}">{{ $order->phone_number}}</a>
    </div>
    @endforeach
</div>
@endsection
