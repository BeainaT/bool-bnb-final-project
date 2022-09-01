@extends('layouts.app')

@section('content')
<section class="dashboard">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center welcome">Bentornato {{$user->name}}</h2>
                </div>
                <div class="card-body d-flex justify-content-between">
                    <div class="dash"><a href="{{route('user.houses.create')}}"><i class="fa-solid fa-house-chimney-window"></i> Inserisci appartamento</a></div>
                    <div class="dash"><a href="{{route('user.houses.index')}}"><i class="fa-solid fa-bars"></i> Lista appartamenti</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection