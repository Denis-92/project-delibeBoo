@extends('layouts.dashboard')

@section('content')
    <p>{{ $resturant->name }}</p>
    <p>{{ $resturant->slug }}</p>
    <a href="{{ route('admin.resturants.edit', $resturant->id) }}">Modifica</a>

    <form action="{{ route('admin.resturants.destroy', $resturant->id) }}" method="post" onsubmit="conferma(event)">
        @csrf
        @method('delete')
        <input type="submit" value="Cancella">
    </form>
@endsection
<script>
    function conferma(event) {
        const confirmdelete = confirm(
            "Are u sure u want to delete it?"
        );
        if (!confirmdelete) {
            event.preventDefault(); // evento che inibisce submit del form
        }
    }
</script>
