@extends('layouts.dashboard')

@section('content')
    ciao ben venuto sul tuo profilo:
    {{ $user->name }}
    <div>
        <a href="{{ route('admin.users.show', $user->id) }}">Mostra dettaglio</a>
    </div>
@endsection
