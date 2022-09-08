@extends('welcome')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            <div class="card-header mb-2">
                <h2>Sponsorizza appartamento</h2>
            </div>
            @foreach ($promotes as $promote)
                {{$promote->name}}
                {{$promote->price}}
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection