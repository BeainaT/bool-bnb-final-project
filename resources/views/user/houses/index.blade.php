@extends('welcome')

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
                        <div class="container">
                            <li class="row align-items-center py-2">
                                <div class="col-md-3">
                                    <img class="img_list_houses" src="{{asset('storage/'.$house->image)}}" alt="">
                                </div>
                                <div class="col">
                                    <div class="house_name">
                                        <h5>{{$house->name}}</h5>
                                    </div>
                                    <div class="house_address">
                                        {{$house->address}}
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{route('user.houses.show', $house->id)}}" class="btn icon"><i class="fa-solid fa-eye"></i></a>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{route('user.houses.edit', $house->id)}}" class="btn icon"><i class="fa-solid fa-pen-to-square"></i></a>
                                </div>
                                <div class="col-md-1">
                                    <a class="btn icon sponsor" href="#"><i class="fa-solid fa-star"></i></a>
                                </div>
                                <div class="col-md-1">
                                    <a class="btn icon delete" href="#" data-toggle="modal" data-target="#ModalDelete{{$house->id}}"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </li>
                            <hr>
                        </div>
                            @include('user.houses.modal.delete')                
                        @endforeach
                       
                    </ul>
                    <div class="container">
                        <div class="row justify-content-between">
                            <a class="btn" href="{{route('user.dashboard')}}">Torna alla Dashboard</a>
                            <a class="btn" href="{{route('user.houses.create')}}">Inserisci appartamento</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection