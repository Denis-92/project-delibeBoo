@extends('layouts.dashboard')

@section('content')
    <div>
        <a href="{{ route('admin.plates.create') }}">
            CREA NUOVO PIATTO</a>
    </div>

    <h2 class="text-info mb-5">I TUOI PIATTI:</h2>

    <div class="d-flex flex-column w-100" style="row-gap: 100px">
        <div class="w-100">
            @foreach ($plates as $plate)
                <h2>
                    <a href="{{ route('admin.plates.show', $plate->id) }}">
                        {{ $plate->name }}
                    </a>

                </h2>
            @endforeach
        </div>
    </div>
@endsection
