@extends('layouts.dashboard')

@section('content')
    <div class="w-100">
        <h5><a href="{{ URL::previous() }}" class="text-danger" style="text-decoration: underline">Back</a></h5>
    </div>

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
@endsection
