@extends('layouts.dashboard')

@section('content')

    <div class="d-flex w-100">
        <h5> <a class="text-danger" style="text-decoration: underline" href="{{ route('admin.resturants.index') }}">Back</a>
        </h5>
    </div>

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
    @if ($resturant->image !== null)
        <div style="width: 400px; height:250px">
            <img style="height: 100%; width: 100%" src="{{ asset('storage/' . $resturant->image) }}" alt="test">
        </div>
    @endif
    <div class="d-flex mt-4" style="column-gap: 20px">
        <a class="btn btn-warning" href="{{ route('admin.resturants.edit', $resturant->id) }}">Modifica</a>

        <form class="p-0 m-0" action="{{ route('admin.resturants.destroy', $resturant->id) }}" method="post"
            onsubmit="conferma(event)">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Cancella">
        </form>
    </div>

    <div class="d-flex" style="column-gap: 20px">
        <div>
            <a href="{{ route('admin.orders.index', $resturant->id) }}" class="btn btn-info my-5">Ordini</a>
        </div>
        <div>
            <a href="{{ route('admin.plates.index', $resturant->id) }}" class="btn btn-primary my-5">Menu</a>
        </div>
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
