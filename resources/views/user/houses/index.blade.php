@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>I tuoi appartamenti</h2>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($houses as $house)
                            <li>
                                <img style="width:50px;" src="{{asset('storage/'.$house->image)}}" alt="">
                                {{$house->name}}
                                {{$house->address}}
                                <a href="{{route('user.houses.show', $house->id)}}" class="btn btn-primary">Visualizza</a>
                                <a href="{{route('user.houses.edit', $house->id)}}" class="btn btn-warning">modifica</a>
                                <form action="{{route('user.houses.destroy', $house->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">elimina</button>
                                </form>
                            </li>                            
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection