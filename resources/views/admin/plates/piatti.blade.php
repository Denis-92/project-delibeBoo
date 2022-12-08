@extends('layouts.dashboard')

@section('content')
    <div>I piatti piu gustusi da presentare ai clienti !</div>
    <div>
        <a href="{{ route('admin.plates.create') }}">
            CREA NUOVO PIATTO</a>
    </div>
    <div>
        <h3>Vai al menu' del tuo ristorante:</h3>
        <form method='GET' action="{{ route('admin.plates.index') }}">
            @csrf
            @foreach (Auth::user()->resturants as $item)
                <div class="d-flex justify-content-between btn btn-primary my-3 align-items-center">
                    <label class='m-0' for="">{{ $item->name }}</label>
                    <input type="radio" name="r_id" value="{{ $item->id }}">
                </div>
            @endforeach
            <div class="d-flex justify-content-around">
                <input type="submit" class="btn btn-info" value="Ricerca">
            </div>
        </form>
    </div>
@endsection
