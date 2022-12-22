@extends('layouts.dashboard')

@section('content')
    <div class="w-100">
        <div class="d-flex flex-column justify-content-between align-items-center p-2"
            style="width: 100%; background-color: #bffed9 !important; row-gap:15px">
            <h3 class="m-0 text-success">Aggiungi Attivita'</h3>
            <a href="{{ route('admin.resturants.create') }}" class="btn btn-success">Aggiungi</a>
        </div>
    </div>

    <div><br><br></div>

    <h2 class="text-info mb-5">LE TUE ATTIVITA':</h2>

    <div class="d-flex flex-column w-100" style="row-gap: 100px">
        <div class="w-100">
            @foreach ($resturants as $rest)
                @if ($rest->user_id === $user->id)
                    <div class="d-flex justify-content-between align-items-center p-2"
                        style="width: 100%; background-color: #bfe2fe !important">
                        <h3 class="m-0 text-dark">{{ $rest->name }}</h3>
                        <a href="{{ route('admin.resturants.show', $rest->id) }}" class="btn btn-info">Dettagli</a>
                    </div>
                @endif
            @endforeach
        </div>
        <br>
    </div>
@endsection
