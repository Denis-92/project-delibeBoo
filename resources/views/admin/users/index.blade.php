@extends('layouts.dashboard')

@section('content')
    <div class="d-flex flex-column align-items-center pt-5 w-100" style="height: 100%">
        <div class="mb-5 pb-5 w-100">
            <h1
                style="padding: 30px 0;text-align: center; font-size:50px; border-radius: 20px; background-color:#bfe2ff ; color:white;">
                IL
                TUO PROFILO</h1>
        </div>
        <div>
            <h1>
                {{ $user->name }}
            </h1>
        </div>
        <p>Email: {{ $user->email }}</p>
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
