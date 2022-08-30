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
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{$house->id}}">{{ __('Elimina') }}</button>
                            </li>                            
                        @endforeach
                        @include('user.houses.modal.delete')
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection