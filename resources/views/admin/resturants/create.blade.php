@extends('layouts.dashboard')

@section('content')
    <h1 class="mb-5">Inserisci i Dati per la tua Attivita': </h1>

    <form action="{{ route('admin.resturants.store') }}" method="POST">
        @csrf
        <div class="d-flex flex-column">

            <label for="name">Nome Attivita:</label>
            <input type="text" name="name" min="3" max="255" required placeholder="Nome Attivita'">
            @error('name')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror


            <label for="address">Indirizzo:</label>
            <input type="text" name="address" min="3" max="255" required placeholder="Indirizzo'">
            @error('address')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror

            <label for="p_iva">P.Iva:</label>
            <input type="text" name="p_iva" min="11" max="11" required placeholder="P.Iva">
            @error('p_iva')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror
            <label for="lunch_opening">Apertura Pranzo:</label>
            <input type="time" name="lunch_opening" placeholder="Apertura Pranzo">
            <label for="lunch_closing">Chiusura Pranzo:</label>
            <input type="time" name="lunch_closing" placeholder="Chiusura Pranzo">
            <label for="dinner_opening">Apertura Cena:</label>
            <input type="time" name="dinner_opening" placeholder="Apertura Cena">
            <label for="dinner_closing">Chiusura Cena:</label>
            <input type="time" name="dinner_closing" placeholder="Chiusura Cena">
            <input type="submit" class="btn btn-success m-2" value="Invia">

        </div>
    </form>
@endsection

<style>
    form {
        width: 30%
    }

    form>* {
        row-gap: 20px
    }
</style>
