@extends('layouts.dashboard')

@section('content')
    <div class="w-100">
        <h5><a href="{{ URL::previous() }}" class="text-danger" style="text-decoration: underline">Torna alla pagina
                precedente</a></h5>
    </div>


    <h1>Modifica il tuo Profilo:</h1>
    @if ($errors->any())
        <div class="row mb-2">
            <div class="col-12 bg-danger">
                Correggere gli errori!
            </div>
        </div>
    @endif

    <form style="    display: flex;
    flex-direction: column;
    row-gap: 20px;
    padding: 50px 0px;" method="POST"
        action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PATCH')
        <div @error('name') class='is-invalid' @enderror>
            <label class="m-0" for="name">Nome</label>
            <input style="width:50%" type="text" name="name" required value="{{ old('name', $user->name) }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div @error('email') class='is-invalid' @enderror>
            <label class="m-0" for="email">Email</label>
            <input style="width:50%" type="text" name="email" required value="{{ old('email', $user->email) }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <input class="btn btn-success" type="submit" value="Aggiorna">
        </div>
    </form>
@endsection
<style>
    form {
        width: 50%
    }

    form>* {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        column-gap: 20px;
        width: 100%
    }
</style>
