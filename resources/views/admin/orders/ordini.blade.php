@extends('layouts.dashboard')

@section('content')
    <div>
        <h3 class="p-5">Controlla gli ordini dei piatti della tua Attivita'</h3>
    </div>
    <div class="d-flex justify-content-around" style="width: 80%">

        @foreach (Auth::user()->resturants as $resturant)
            @if (count($resturant->plates) != 0)
                <div>
                    <h4 class="p-3 border border-info">{{ $resturant->name }}</h4>
                    <form method='GET' action="{{ route('admin.orders.index') }}">
                        @csrf
                        @foreach ($resturant->plates as $plate)
                            <div class="d-flex justify-content-between btn btn-primary my-3 align-items-center">
                                <label class='m-0' for="">{{ $plate->name }}</label>
                                <input type="radio" name="plate_id" value="{{ $plate->id }}">
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-around">
                            <input type="submit" class="btn btn-success" value="Ricerca">
                        </div>
                    </form>
                </div>
            @endif
        @endforeach


    </div>
@endsection
