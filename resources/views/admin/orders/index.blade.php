@extends('layouts.dashboard')

@section('content')
    <div>
        <h1>LISTA ORDINI:</h1>
        @foreach ($orders as $order)
            <div class="card">

                <div>
                    <h5>Email:</h5>
                    <a href="{{ route('admin.orders.show', $order->id) }}">{{ $order->email }}</a>
                </div>

            </div>
        @endforeach

        <div>
            <a href="{{ route('admin.orders.create') }}">NUOVO</a>
        </div>
    </div>
@endsection
