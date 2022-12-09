@extends('layouts.dashboard')

@section('content')
    <h1 class="mb-5">Aggiungi categoria:</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="d-flex flex-column">

            <label for="nome">Nome Categoria:</label>
            <input type="text" name="nome" min="3" max="255" required placeholder="Nome Categoria'">
            @error('nome')
                <div class='alert alert-danger p-1 ms-3 mb-0'>
                    {{ __($message) }}
                </div>
            @enderror

            <div class="d-flex justify-content-center">
                <input type="submit" class="btn btn-success m-2" value="Invia">
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
