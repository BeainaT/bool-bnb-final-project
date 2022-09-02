@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>I tuoi appartamenti</h2>
                </div>
                <div>
                    <ul class="list-unstyled">
                        @foreach ($houses as $house)
                            <li class="p-2">
                                <img style="width:50px;" src="{{asset('storage/'.$house->image)}}" alt="">
                                {{$house->name}}
                                {{$house->address}}
                                <a href="{{route('user.houses.show', $house->id)}}" class="btn btn-primary">Visualizza</a>
                                <a href="{{route('user.houses.edit', $house->id)}}" class="btn btn-warning">modifica</a>
                                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#ModalDelete{{$house->id}}">{{ __('Elimina') }}</a>
                            </li>            
                            @include('user.houses.modal.delete')                
                        @endforeach
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection