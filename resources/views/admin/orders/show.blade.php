@extends('layouts.app')

@section('content')
    <h3>DETTAGLI ORDINE:</h3>
    <div>
        <p {{ route('admin.orders.show', $order->id) }}>Totale ordine: {{ $order->total_price }}</p>
    </div>
    <div>
        <p {{ route('admin.orders.show', $order->id) }}>Data ordine: {{ $order->date }}</p>
    </div>
    <div>
        <p {{ route('admin.orders.show', $order->id) }}>Indirizzo: {{ $order->address }}</p>
    </div>

    <div>
        <p {{ route('admin.orders.show', $order->id) }}>Numero pezzi: {{ $order->pieces }}</p>
    </div>
    <div>
        <p {{ route('admin.orders.show', $order->id) }}>Email: {{ $order->email }}</p>
    </div>
    <div>
        <p {{ route('admin.orders.show', $order->id) }}>Numero di telefono: {{ $order->phone_number }}</p>
    </div>

    <div>
        <a href="{{ route('admin.orders.edit', $order->id)}}">EDITA</a>
    </div>
@endsection
