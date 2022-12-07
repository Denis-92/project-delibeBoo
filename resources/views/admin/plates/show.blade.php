@extends('layouts.dashboard')

@section('content')
    <h2>
        Titolo:
        {{ $plate->name }}
    </h2>
    <p>
        Descrizione:
        {{ $plate->description }}
    </p>
    <p>
        Prezzo:
        {{ $plate->price }}
    </p>
    <p>
        Hidden:
        @if ($plate->hidden)
            Piatto nascosto
        @else
            Piatto visibile
        @endif
    </p>

    <p>
        Slug:
        {{ $plate->slug }}
    </p>

    <p>
        Categoria:
        {{ $plate->category }}
    </p>

    <a href="{{ route('admin.plates.edit', $plate->id) }}">Modifica</a>

    <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="post" onsubmit="conferma(event)">
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
