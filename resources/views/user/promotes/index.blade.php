@extends('welcome')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            <div class="card-header mb-2">
                <h2>Sponsorizza appartamento</h2>
            </div>
            <div class="container-md text-center pt-1 pb-3 promotes">
                @foreach ($promotes as $promote)
                    <a href="{{route('user.promotes.show', ['promote' => $promote->id, 'house' => $house->id])}}">
                        <div class="btn btn_promotes col-6 my-2">
                            <span class="promote_name">{{$promote->name}}:</span> {{$promote->price}} € per {{$promote->duration}}/h
                        </div>
                    </a>
                @endforeach
                <hr>
                <div class="row">
                    <a class="btn col-5" href="{{route('user.houses.index')}}">Torna alla lista</a>
                </div>
                @if (session('status'))
                    <div class="my-3">
                        <p>{{session('status')}}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection