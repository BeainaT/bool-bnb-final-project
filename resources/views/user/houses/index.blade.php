@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center uppercase">I tuoi appartamenti</h2>
                </div>
                <div class="card-body d-flex flex-column justify-content-around flex-nowrap">
                    <ul>
                        @foreach ($houses as $house)
                            <li>
                                <div class="row">
                                    <div class="col-6">  <img style="width:50px;" src="{{asset('storage/'.$house->image)}}" alt="">
                                        {{$house->name}}
                                        {{$house->address}}</div>
                                        <div class="col-6"> <a href="{{route('user.houses.show', $house->id)}}" class="btn btn-primary">Visualizza</a>
                                            <a href="{{route('user.houses.edit', $house->id)}}" class="btn btn-warning">modifica</a>
                                            <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#ModalDelete{{$house->id}}">{{ __('Elimina') }}</a></div>
                                  
                                </div>
                                
                               
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