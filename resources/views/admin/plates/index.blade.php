@extends('layouts.dashboard')

@section('content')
    <h2 class="text-info mb-5">I TUOI PIATTI:</h2>

    <div class="d-flex flex-column w-100" style="row-gap: 100px">
        <div class="w-100">
            @foreach ($plates as $plate)
                <h2>

                    <div class="d-flex justify-content-between">
                        <h4> {{ $plate->name }}</h4>

                        <div class="d-flex">
                            <a href="{{ route('admin.plates.show', $plate->id) }}" class="btn btn-success">Dettails</a>
                            <a href="{{ route('admin.plates.edit', $plate->id) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="post"
                                onsubmit="conferma(event)" class="m-0">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Cancella">
                            </form>

                        </div>
                    </div>
                </h2>
            @endforeach
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
