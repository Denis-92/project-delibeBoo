@extends('layouts.dashboard')

@section('content')
    <div class="w-100 mb-4">
        <h3>
            <a href="{{ URL::previous() }}" class="text-danger" style="text-decoration: underline">Torna alla lista dei
                piatti</a>
        </h3>
    </div>
    <h1 class="mb-5">Modifica piatto: </h1>

    <form action="{{ route('admin.plates.update', $plate->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="d-flex flex-column">

            <label for="name">Nome Piatto:</label>
            <input type="text" name="name" required value="{{ old('name', $plate->name) }}">
            @error('name')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror


            <label for="description">Ingredienti:</label>
            <textarea name="description" cols="4" rows="10" required>{{ old('description', $plate->description) }}</textarea>
            @error('description')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror

            <label for="price">Prezzo:</label>
            <input type="number" min="0" step="0.05" name="price" required
                value="{{ old('price', $plate->price) }}">
            @error('price')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror

            <div>
                <input type="radio" name="hidden" value="0" @if (!$plate->hidden) checked @endif>
                <label for="hidden">Piatto disponibile</label>
            </div>
            <div>
                <input type="radio" name="hidden" value="1" @if ($plate->hidden) checked @endif>
                <label for="hidden">Piatto non disponibile</label>
            </div>
            @error('hidden')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror

            <label for="category">Categoria:</label>
            <select name="category">
                <option value="" @if ($plate->category == null) selected @endif>Nessuna categoria</option>
                <option value="Bevanda" @if ($plate->category == 'Bevanda') selected @endif>Bevanda</option>
                <option value="Primo" @if ($plate->category == 'Primo') selected @endif>Primo</option>
                <option value="Secondo" @if ($plate->category == 'Secondo') selected @endif>Secondo</option>
                <option value="Dolce" @if ($plate->category == 'Dolce') selected @endif>Dolce</option>
            </select>
            @error('category')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror

            <div>
                <label for="image">Cambia immagine:</label>
                <input type="file" name="image" />
                <img class=" mt-3 img-fluid" src="{{ asset('storage/' . $plate->image) }}" alt="">
                @error('image')
                    <div class='alert alert-danger p-1 ms-3 mb-0'>
                        {{ __($message) }}
                    </div>
                @enderror
            </div>



            <div class="d-flex justify-content-center centrato-asse-y">
                <input type="submit" class="btn btn-success m-2" value="Modifica">
                <h5>
                    <a href="{{ URL::previous() }}" class="text-danger" style="text-decoration: underline">Torna alla lista
                        dei piatti</a>
                </h5>
            </div>

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

    .centrato-asse-y {
        align-items: center;
    }
</style>
