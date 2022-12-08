@extends('layouts.dashboard')

@section('content')
    <div>
        <h3>Scegli ristorante per vedere i relativi ordini ricevuti:</h3>
        @foreach ($orders as $rest)
            @if ($rest->user_id === $user->id)
                <div class="d-flex justify-content-between align-items-center p-2"
                    style="width: 100%; background-color: #bfe2fe !important">
                    <h3 class="m-0 text-dark">{{ $rest->name }}</h3>
                    <a href="{{ route('admin.orders.index', $rest->id) }}" class="btn btn-info">Lista</a>
                </div>
            @endif
        @endforeach
    </div>
@endsection
