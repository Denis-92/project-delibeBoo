@extends('layouts.dashboard')

@section('content')
    <h1>Inserisci la tua Attivita' </h1>

    <form action="{{ route('admin.resturants.update', $resturant->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="d-flex flex-column">

            <label for="name">Nome Attivita:</label>
            <input value="{{ old('name', $resturant->name) }}" type="text" name="name" min="3" max="255"
                required />
            @error('name')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror


            <label for="address">Indirizzo:</label>
            <input value="{{ old('address', $resturant->address) }}" type="text" name="address" min="3"
                max="255" required />
            @error('address')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror


            <label for="p_iva">P.Iva:</label>
            <input type="text" name="p_iva" min="11" max="11" required
                value="{{ old('p_iva', $resturant->p_iva) }}" />
            @error('p_iva')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror

            <label for="lunch_opening">Apertura Pranzo:</label>
            <input type="time" name="lunch_opening" value="{{ old('lunch_opening', $resturant->lunch_opening) }}" />

            <label for="lunch_closing">Chiusura Pranzo:</label>
            <input type="time" name="lunch_closing" value="{{ old('lunch_closing', $resturant->lunch_closing) }}" />

            <label for="dinner_opening">Apertura Cena:</label>
            <input type="time" name="dinner_opening" value="{{ old('dinner_opening', $resturant->dinner_opening) }}" />

            <label for="dinner_closing">Chiusura Cena:</label>
            <input type="time" name="dinner_closing" value="{{ old('dinner_closing', $resturant->dinner_closing) }}" />


            @if ($errors->any())
                <div class="d-flex align-items-center " @error('categories') class="is-invalid" @enderror>
                    <p class="m-0 p-0">Categorie:</p>
                    <div class="d-flex align-items-center flex-wrap ml-5" style="column-gap: 30px; row-gap: 10px">
                        @foreach ($categories as $category)
                            <div class="d-flex" style="width:calc(100% / 7 - 10px); column-gap:5px">
                                <label class="p-0 m-0" for="categories[]">{{ $category->nome }}</label>
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                    {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }} />
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-center align-items-center ">
                    <p class="m-0 p-0 ">Categorie:</p>
                    <div class="d-flex  ml-5 align-items-center flex-wrap" style="column-gap: 30px; row-gap: 10px">
                        @foreach ($categories as $category)
                            <div class="d-flex" style="width:calc(100% / 7 - 10px); column-gap:5px">
                                <label class="p-0 m-0" for="categories[]">{{ $category->nome }}</label>
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                    {{ $resturant->categories->contains($category) ? 'checked' : '' }} />
                            </div>
                        @endforeach
                    </div>
                </div>
                @error('categories')
                    <div class='alert alert-danger p-1 ms-3 mb-0'>
                        {{ __($message) }}
                        <!-- i __ sono per aggiungere le traduzioni per le lingue-->
                    </div>
                @enderror
            @endif

            <div class="d-flex justify-content-center"> <input type="submit" class="btn btn-success" value="Invia"></div>

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
