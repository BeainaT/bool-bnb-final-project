@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card container">
                <div class="card-header">
                    <h2>Il tuo appartamento nel dettaglio</h2>
                </div>
                <div class="card-body row">
                    <div class="container_house_image col-4">
                        <img class="img_house_show" src="{{str_starts_with($house->image, 'i') ? asset($house->image) : asset('storage/'.$house->image)}}" alt="">
                    </div>
                    <div class="container_house_details col-8">
                        <ul>
                            <li>   
                                <h2>{{$house->name}}</h2>
                            </li>
                            <li>
                                {{$house->address}}
                            </li>
                            <hr>
                            <li>
                                Numero stanze: {{$house->number_rooms}}
                            </li>
                            <li>
                                Numero bagni: {{$house->number_bathrooms}}
                            </li>
                            <li>
                                Numero letti: {{$house->number_bathrooms}}
                            </li>
                            <li>
                                Metri quadrati: {{$house->square_meters}}
                            </li>
                            <hr>
                            @if(isset($typology->name))
                                <li>
                                    Tipologia di alloggio: {{$typology->name}}
                                </li>
                                <hr>
                            @endif
                            <li>
                                <p>Servizi inclusi:</p> 
                                @foreach ($services as $service)
                                    <ul>
                                        <li>{{$service->name}}</li>
                                    </ul>
                                @endforeach 
                            </li>
                            <hr>
                            @if(isset($house->price))
                                <li>
                                    Prezzo: {{$house->price}} euro
                                </li>
                                <hr>
                            @endif
                        </ul>
                    </div>
                    <div class="container">
                        <div class="row justify-content-between">
                            <a class="btn col-5" href="{{route('user.houses.index')}}">Torna alla lista</a>
                            <a class="btn col-5" href="{{route('user.houses.edit', $house->id)}}">Modifica</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection