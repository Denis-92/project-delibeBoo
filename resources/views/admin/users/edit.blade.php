@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div class="row mb-2">
            <div class="col-12 bg-danger">
                Correggere gli errori!
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PATCH')
        <div @error('name') class='is-invalid' @enderror>
            <label for="name">Nome</label>
            <input type="text" name="name" required value="{{ old('name', $user->name) }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div @error('email') class='is-invalid' @enderror>
            <label for="email">Email</label>
            <input type="text" name="email" required value="{{ old('email', $user->email) }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="submit" value="Aggiorna">
        </div>
    </form>
@endsection
