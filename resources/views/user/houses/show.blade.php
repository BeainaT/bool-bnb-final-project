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
                        @if ($house->image == "default")
                            <img class="img_house_show" src="{{asset('img/houses/default_house.jpeg')}}" alt="">
                        @else
                            <img class="img_house_show" src="{{asset('storage/'.$house->image)}}" alt="">
                        @endif   
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
                            <li>
                                Tipologia di alloggio: {{$house->typology_id}}
                            </li>
                            <hr>
                            <li>
                                Servizi: 
                            </li>
                        </ul>
                    </div>
                    <div class="container">
                        <div class="row justify-content-between">
                            <a class="btn" href="{{route('user.houses.index')}}">Torna alla lista</a>
                            <a class="btn" href="{{route('user.houses.edit', $house->id)}}">Modifica</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection