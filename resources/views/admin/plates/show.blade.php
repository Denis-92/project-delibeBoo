@extends('layouts.dashboard')

@section('content')
    <h2>
        Titolo:
        {{ $plate->name }}
    </h2>
    <p>
        Descrizione:
        {{ $plate->description }}
    </p>
    <p>
        Prezzo:
        {{ $plate->price }}
    </p>
    <p>
        Hidden:
        @if ($plate->hidden)
            Piatto nascosto
        @else
            Piatto visibile
        @endif
    </p>

    <p>
        Slug:
        {{ $plate->slug }}
    </p>

    <p>
        Categoria:
        {{ $plate->category }}
    </p>


    <div>
        <a href="{{ URL::previous() }}" class="btn btn-danger">BACK</a>
    </div>
@endsection
