@extends('layouts.dashboard')

@section('content')
    <div class="w-100 mb-4">
        <a href="{{ URL::previous() }}" class="text-danger" style="text-decoration: underline">BACK</a>
    </div>
    <h1 class="mb-5">Inserisci nuovo piatto: </h1>

    <form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column">

            <div class="d-flex align-items-center justify-content-start mb-3 d-none">
                @foreach ($restid as $id)
                    <label class="m-0 p-0 mr-4" for="resturant_id"></label>
                    <input class='d-none' type="radio" value="{{ $id }}" name="resturant_id" checked>
                @endforeach

            </div>

            <label for="name">Nome Piatto:</label>
            <input type="text" name="name" required>
            @error('name')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror


            <label for="description">Ingredienti:</label>
            <input type="textarea" name="description" required>
            @error('description')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror

            <label for="price">Prezzo:</label>
            <input type="number" min="0" step="0.05" name="price" required>
            @error('price')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror

            <div>
                <input type="radio" name="hidden" value="0">
                <label for="hidden">Piatto visibile</label>
            </div>
            <div>
                <input type="radio" name="hidden" value="1">
                <label for="hidden">Piatto nascosto</label>
            </div>
            @error('hidden')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror

            <label for="category">Categoria:</label>
            <select name="category">
                <option value="">Nessuna categoria</option>
                <option value="Bevanda">Bevanda</option>
                <option value="Primo">Primo</option>
                <option value="Secondo">Secondo</option>
                <option value="Dolce">Dolce</option>
            </select>
            @error('category')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror

            <label for="image">Carica immagine:</label>
            <input type="file" name="image">
            @error('image')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror

            <input type="submit" class="btn btn-success m-2" value="Crea">

        </div>
    </form>
@endsection

<style>
    form {
        width: 60%
    }

    form>* {
        row-gap: 20px
    }
</style>
