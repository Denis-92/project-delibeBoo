@extends('layouts.dashboard')

@section('content')
    <div class="d-flex" style="column-gap: 20px">
        <p>Nome:</p>
        <h5>{{ $resturant->name }}</h5>
    </div>
    <div class="d-flex" style="column-gap: 20px">
        <p>Indirizzo:</p>
        <h5>{{ $resturant->address }}</h5>
    </div>
    <div class="d-flex" style="column-gap: 20px">
        <p>Orario Apertura Pranzo:</p>
        <h5>{{ $resturant->lunch_opening }}</h5>
    </div>
    <div class="d-flex" style="column-gap: 20px">
        <p>Orario Chiusura Pranzo:</p>
        <h5>{{ $resturant->lunch_closing }}</h5>
    </div>
    <div class="d-flex" style="column-gap: 20px">
        <p>Orario Apertura Cena:</p>
        <h5>{{ $resturant->dinner_opening }}</h5>
    </div>
    <div class="d-flex" style="column-gap: 20px">
        <p>Orario Chiusura Cena:</p>
        <h5>{{ $resturant->dinner_closing }}</h5>
    </div>
    <div class="d-flex" style="column-gap: 20px">
        <p>Categorie:</p>
        @if (count($resturant->categories) > 0)
            <div class="d-flex flex-column">
                @foreach ($resturant->categories as $category)
                    <div class="d-flex">
                        <h5>{{ $category->name }}</h5>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <div>
        <img src="{{ asset('storage/' . $resturant->image) }}" alt="test">
    </div>

    <div class="d-flex mt-4" style="column-gap: 20px">
        <a class="btn btn-warning" href="{{ route('admin.resturants.edit', $resturant->id) }}">Modifica</a>

        <form class="p-0 m-0" action="{{ route('admin.resturants.destroy', $resturant->id) }}" method="post"
            onsubmit="conferma(event)">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Cancella">
        </form>
    </div>

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
