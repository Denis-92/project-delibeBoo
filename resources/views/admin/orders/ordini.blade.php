@extends('layouts.dashboard')

@section('content')
    <div>
        <h3>Scegli ristorante per vedere i relativi ordini ricevuti:</h3>
        <form method='GET' action="{{ route('admin.orders.index') }}">
            @csrf
            @foreach (Auth::user()->resturants as $item)
                <div class="d-flex justify-content-around btn btn-primary my-3 align-items-center">
                    <label class='m-0' for="">{{ $item->name }}</label>
                    <input type="radio" name="r_id" style="width: 100%" value="{{ $item->id }}">
                </div>
            @endforeach
            <div class="d-flex justify-content-around">
                <input type="submit" class="btn btn-info" value="Ricerca">
            </div>
        </form>
    </div>
@endsection
