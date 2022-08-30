@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Ciao {{$user->name}}</h2>
                </div>
                <div class="card-body d-flex justify-content-between">
                    <button class="btn btn-light"><a href="{{route('user.houses.create')}}">Inserisci appartamento</a></button>
                    <button class="btn btn-light"><a href="{{route('user.houses.index')}}">Lista appartamenti</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection