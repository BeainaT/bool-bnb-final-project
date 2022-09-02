@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h2>Ciao {{$user->name}}</h2>
                </div>
                <div class="card-body d-flex justify-content-between">
                    <a class="btn" href="{{route('user.houses.create')}}">Inserisci appartamento</a>
                    <a class="btn" href="{{route('user.houses.index')}}">Lista appartamenti</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection