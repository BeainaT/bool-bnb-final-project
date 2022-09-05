@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-2">
                    <h2>I tuoi appartamenti</h2>
                </div>
                <div class="card-body">
                    <div class="container py-1">
                        @foreach ($houses as $house)
                        <div class="row align-items-center justify-content-center my-1">
                            <div class="col-3 py-1">
                                <img class="img_list_houses" src="{{str_starts_with($house->image, 'i') ? asset($house->image) : asset('storage/'.$house->image)}}" alt="">
                            </div>
                            <div class="col-9 col-lg-4 py-1">
                                <div class="house_name">
                                    <h5>{{$house->name}}</h5>
                                </div>
                                <div class="house_address">
                                    {{$house->address}}
                                </div>
                            </div>
                            <div class="col-3 col-lg-1 py-1">
                                <a href="{{route('user.houses.show', $house->id)}}" class="btn icon"><i class="fa-solid fa-eye"></i></a>
                            </div>
                            <div class="col-3 col-lg-1 py-1">
                                <a href="{{route('user.houses.edit', $house->id)}}" class="btn icon"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                            <div class="col-3 col-lg-1 py-1">
                                <a class="btn icon sponsor" href="http://localhost:3000/" target="_blank"><i class="fa-solid fa-star"></i></a>
                            </div>
                            <div class="col-3 col-lg-1 py-1">
                                <a class="btn icon delete" href="#" data-toggle="modal" data-target="#ModalDelete{{$house->id}}"><i class="fa-solid fa-trash"></i></a>
                                @include('user.houses.modal.delete')    
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                    <div class="container">
                        <div class="row justify-content-between">
                            <a class="btn col-5" href="{{route('user.dashboard')}}">Torna alla Dashboard</a>
                            <a class="btn col-5" href="{{route('user.houses.create')}}">Inserisci appartamento</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
