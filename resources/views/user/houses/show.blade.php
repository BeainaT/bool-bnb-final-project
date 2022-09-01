@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Il tuo appartamento nel dettaglio</h2>
                </div>
                <div class="card-body">
                    
                    <ul>
                        {{-- @foreach ($houses as $house) --}}
                            <li>
                                @if ($house->image == "default")
                                    <img style="width:50px;" src="{{asset('img/houses/default_house.jpeg')}}" alt="">
                                @else
                                    <img style="width:50px;" src="{{asset('storage/'.$house->image)}}" alt="">
                                @endif
                                {{$house->name}}
                                {{$house->address}}
                            </li>                            
                        {{-- @endforeach --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection