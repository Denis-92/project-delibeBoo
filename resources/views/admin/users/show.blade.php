@extends('layouts.dashboard')

@section('content')
    <div>
        Benvenuto
        <span>
            <h1>
                {{ $user->name }}
            </h1>
        </span>

        <hr>
        <p>Email {{ $user->email }}</p>

        <div class="mt-5">
            <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
        </div>

        <div class="mt-1">
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Cancella" onclick="confirm('Are you sure?')">
            </form>
        </div>

    </div>
@endsection
