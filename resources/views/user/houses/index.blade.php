@extends('layouts.app')

@section('content')
<section class="background-img house-list">
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
                                    <div class="col-6 d-flex align-items-center justify-content-between"> 
                                        <div class="img-house pr-2">
                                            @if (File::exists(public_path('storage/'.$house->image)))
                                            <img src="{{asset('storage/'.$house->image)}}" alt="" />
                                            @else 
                                            <img src="{{ asset('images/iconhouse.png') }}" alt="" />
                                            @endif
                                        </div> 
                                        {{$house->name}}
                                        {{$house->address}}</div>
                                        <div class="col-6 d-flex align-items-center justify-content-around buttons"> 
                                            <a class="view" href="{{route('user.houses.show', $house->id)}}"><i class="fa-regular fa-eye"></i> Visualizza</a>
                                            <a class="edit" href="{{route('user.houses.edit', $house->id)}}"><i class="fa-solid fa-pen-to-square"></i> Modifica</a>
                                            <a class="delete" href="#" data-toggle="modal" data-target="#ModalDelete{{$house->id}}"><i class="fa-solid fa-trash"></i> {{ __('Elimina') }}</a></div>
                                  
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
</section>
@endsection