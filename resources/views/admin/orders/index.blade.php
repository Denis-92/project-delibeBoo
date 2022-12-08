@extends('layouts.dashboard')

@section('content')
    <div style="width: 80%">
        <h1>Chi ha ordinato questo piatto:</h1>
        @if ($orders)
            @foreach ($orders as $order)
                <div class="card">
                    <div>
                        <h5>Email:</h5>
                        <p>{{ $order->email }}</p>
                    </div>
                    <div class="d-flex">
                        <h5 class="mr-3">Il giorno:</h5>
                        <p>{{ $order->created_at }}</p>
                    </div>
                    <a class="btn btn-warning" href="{{ route('admin.orders.show', $order->id) }}">Dettagli</a>
                </div>
            @endforeach
        @else
            <h5>non ci sono ordini per questo piatto</h5>
        @endif

        <div class="my-5 d-flex justify-content-center">
            <a href="{{ route('admin.baseOrder') }}" class="btn btn-danger">Back</a>
        </div>
    </div>
@endsection
