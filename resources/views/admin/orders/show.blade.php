@extends('layouts.dashboard')

@section('content')
    <div class="w-100">
        <h5><a href="{{ route('admin.resturants.show', $id) }}" class="text-danger" style="text-decoration: underline">Torna
                alla pagina precedente</a>
        </h5>
    </div>

    <h3>DETTAGLI ORDINE:</h3>
    <div>
        <p>Totale ordine: {{ $order->total_price }}</p>
    </div>
    <div>
        <p>Data ordine: {{ $order->date }}</p>
    </div>
    <div>
        <p>Indirizzo: {{ $order->address }}</p>
    </div>

    <div>
        <p>Numero pezzi: {{ $order->pieces }}</p>
    </div>
    <div>
        <p>Email: {{ $order->email }}</p>
    </div>
    <div>
        <p>Numero di telefono: {{ $order->phone_number }}</p>
    </div>
    <div>
        <p>Piatti:
            @foreach ($order->plates as $item)
                <a href="{{ route('admin.plates.show', $item->id) }}">{{ $item->name }}</a>
            @endforeach
        </p>
    </div>
@endsection
