@extends('layouts.dashboard')

@section('content')
    <div class="w-100 mb-4">
        <a href="{{ route('admin.plates.index', $id) }}" class="text-danger" style="text-decoration: underline">BACK</a>
    </div>
    <div class="d-flex flex-column boxshow" style="row-gap: 20px">

        <div>
            <h3>Titolo:</h3>
            <h2>{{ $plate->name }}</h2>
        </div>

        <div>
            <h5>Descrizione e Ingredienti: </h5>
            <h6> {{ $plate->description }}</h6>
        </div>

        <div>
            <h5>Prezzo:</h5>
            <h6>{{ $plate->price }}</h6>
        </div>

        <div>
            <h5>Disponibilita':</h5>
            @if ($plate->hidden)
                <h6> Piatto nascosto</h6>
            @else
                <h6> Piatto visibile</h6>
            @endif
        </div>

        <div>
            <h5>Slug:</h5>
            <h6>{{ $plate->slug }}</h6>
        </div>

        <div>
            <h5>Categoria:</h5>
            <h6> {{ $plate->category }}</h6>
        </div>

        @if ($plate->image !== null)
            <div style="width: 400px; height:250px" class="p-0">
                <img style="height: 100%; width: 100%" src="{{ asset('storage/' . $plate->image) }}" alt="test">
            </div>
        @endif
    </div>
@endsection

<style>
    .boxshow>* {
        padding: 5px;
        background-color: rgb(237 248 253);
    }
</style>
