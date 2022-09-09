@extends('welcome')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            <div class="card-header mb-2">
                <h2>Sponsorizza appartamento</h2>
            </div>
            @foreach ($promotes as $promote)
            <button class="btn">
                {{-- <a href="{{route('user.promotes.show', $promote->id)}}"> --}}
                    {{$promote->name}}
                    {{$promote->price}} €
                {{-- </a> --}}
            </button>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection