@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Il tuo appartamento nel dettaglio</h2>
                </div>
                <div class="card-body">
                    <ul>
                        {{-- @foreach ($houses as $house) --}}
                            <li>
                                <img style="width:50px;" src="{{asset('storage/'.$house->image)}}" alt="">
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