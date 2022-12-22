@extends('layouts.dashboard')

@section('content')
    <div class="d-flex w-100">
        <h5> <a class="text-danger" style="text-decoration: underline" href="{{ route('admin.resturants.index') }}">Torna alla
                pagina precedente</a>
        </h5>
    </div>
    <h1 class="mb-5">Inserisci i Dati per la tua Attivita': </h1>

    <form action="{{ route('admin.resturants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column">

            <label for="name">* Nome Attivita:</label>
            <input type="text" name="name" min="3" max="255" required placeholder="Nome Attivita'">
            @error('name')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror


            <label for="address">* Indirizzo:</label>
            <input type="text" name="address" min="3" max="255" required placeholder="Indirizzo'">
            @error('address')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror

            <label for="p_iva">* P.Iva:</label>
            <input type="text" name="p_iva" min="11" max="11" required placeholder="P.Iva">
            @error('p_iva')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror
            <label for="lunch_opening">Apertura Pranzo:</label>
            <input type="time" name="lunch_opening">
            <label for="lunch_closing">Chiusura Pranzo:</label>
            <input type="time" name="lunch_closing">
            <label for="dinner_opening">Apertura Cena:</label>
            <input type="time" name="dinner_opening">
            <label for="dinner_closing">Chiusura Cena:</label>
            <input type="time" name="dinner_closing">
            <div class="d-flex justify-content-center align-items-center" @error('categories') class="is-invalid" @enderror>
                <p class="m-0 p-0">Categorie:&nbsp;&nbsp;</p>
                <div class="d-flex align-items-center flex-wrap" style="column-gap: 30px; row-gap: 10px">
                    @foreach ($categories as $category)
                        <div class="d-flex" style="width:calc(100% / 7 - 10px); column-gap:5px">
                            <label class="p-0 m-0" for="categories[]">{{ $category->name }}</label>
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }} />
                        </div>
                    @endforeach
                </div>

                @error('categories')
                    <div class='alert alert-danger p-1 ms-3 mb-0'>
                        {{ __($message) }}
                        <!-- i __ sono per aggiungere le traduzioni per le lingue-->
                    </div>
                @enderror
            </div>
            <br><br>
            <div>
                <label for="image">Carica immagine:</label>
                <input type="file" name="image">
                @error('image')
                    <div class='alert alert-danger p-1 ms-3 mb-0'>
                        {{ __($message) }}
                    </div>
                @enderror
            </div>

            <div>
                <p>* campo obbligatorio</p>
            </div>
            <div class="d-flex justify-content-center"> <input type="submit" class="btn btn-success m-2" value="Crea">
            </div>

        </div>
    </form>
@endsection

<style>
    form {
        width: 80%
    }

    form>* {
        row-gap: 20px
    }
</style>
