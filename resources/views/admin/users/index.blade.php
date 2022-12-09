@extends('layouts.dashboard')

@section('content')
    <div class="d-flex flex-column align-items-center pt-5" style="height: 100%">
        <div>
            <h2 style="text-align: center">BENVENUTO</h2>
            <div>
                <h1>
                    {{ $user->name }}
                </h1>
            </div>
            <p>Email: {{ $user->email }}</p>
        </div>
        <div class="d-flex" style="column-gap: 15px">
            <div class="">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-success">Edit</a>
            </div>

            <div class="">
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="conferma(event)">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger" type="submit" value="Cancella">
                </form>
            </div>

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
