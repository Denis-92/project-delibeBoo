@extends('layouts.dashboard')

@section('content')
    <h2>
        Titolo:
        {{ $plate->name }}
    </h2>
    <p>
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
        <img src="{{ asset('storage/' . $plate->image) }}" alt="test">
    </div>


    <form method='GET' action="{{ route('admin.plates.index') }}">
        @csrf
        <input type="number" name="r_id" style="width: 100%; display:none" value="{{ $plate->resturant_id }}">
        <div class="d-flex justify-content-around">
            <input type="submit" class="btn btn-danger" value="BACK">
        </div>
    </form>
@endsection
