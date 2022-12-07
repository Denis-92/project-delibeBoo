@extends('layouts.dashboard')

@section('content')
    @foreach ($resturants as $rest)
        @if ($rest->user_id === $user->id)
            <p>{{ $rest->name }}</p>
            <a href="{{ route('admin.resturants.show', $rest->id) }}">Dettagli</a>
        @endif
    @endforeach

    <div>
        <a href="{{ route('admin.resturants.create') }}">Crea Nuovo </a>
    </div>
@endsection
