@extends('welcome')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Inserisci appartamento</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('user.houses.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- name --}}
                        <div class="form-group row align-items-center">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome alloggio *</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- rooms --}}
                        <div class="form-group row align-items-center">
                            <label for="rooms" class="col-md-4 col-form-label text-md-right">Numero stanze *</label>
                            <div class="col-md-6">
                                <input id="rooms" type="number" min="1" class="form-control @error('number_rooms') is-invalid @enderror" name="number_rooms" value="{{ old('number_rooms') }}" required autocomplete="number_rooms" autofocus>
                                @error('number_rooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- beds --}}
                        <div class="form-group row align-items-center">
                            <label for="beds" class="col-md-4 col-form-label text-md-right">Numero letti *</label>
                            <div class="col-md-6">
                                <input id="beds" type="number" min="1" class="form-control @error('number_beds') is-invalid @enderror" name="number_beds" value="{{ old('number_beds') }}" required autocomplete="number_beds">
                                @error('number_beds')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- bathrooms --}}
                        <div class="form-group row align-items-center">
                            <label for="bath" class="col-md-4 col-form-label text-md-right">Numero bagni *</label>
                            <div class="col-md-6">
                                <input id="bath" type="number" min="1" class="form-control @error('number_bathrooms') is-invalid @enderror" name="number_bathrooms" value="{{ old('number_bathrooms') }}" required autocomplete="number_bathrooms" autofocus>
                                @error('number_bathrooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- square meters --}}
                        <div class="form-group row align-items-center">
                            <label for="width" class="col-md-4 col-form-label text-md-right">Metri quadri *</label>
                            <div class="col-md-6">
                                <input id="width" type="number" min="1" class="form-control @error('square_meters') is-invalid @enderror" name="square_meters" value="{{ old('square_meters') }}" required autocomplete="square_meters" autofocus>
                                @error('square_meters')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- address --}}
                        <div class="form-group row align-items-center">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Indirizzo *</label>
                            <div class="col-md-6">
                                <input id="address" type="text" minlength="2" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- image --}}
                        <div class="form-group row align-items-center">
                            <label for="img" class="col-md-4 col-form-label text-md-right">Immagine *</label>
                            <div class="col-md-6">
                                <input id="img" type="file" class=" @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         {{-- descrpition --}}
                         <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Descrizione</label>
                            <div class="col-md-6">
                                <textarea id="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- price --}}
                        <div class="form-group row align-items-center">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Prezzo €</label>
                            <div class="col-md-6">
                                <input id="price" type="number" min="0" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price" autofocus>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        {{-- Essential Services --}}
                        <div class="row form-group">
                            <label for="services" class="col-md-4 col-form-label text-md-right">Servizi essenziali</label>
                            <div class="col-md-6 col-form-label">
                                <div class="container ml-1">
                                    <div class="row">
                                        @foreach ($services as $service)
                                            @if ($service['type'] == 'essenziali')
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="{{$service->name}}" value="{{$service->id}}" name="services[]" {{in_array($service->id, old('services', [])) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="{{$service->name}}">
                                                        {{$service->name}}
                                                    </label>
                                                </div> 
                                            @endif
                                        @endforeach
                                    </div>
                                    @error('services')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- Premium Services --}}
                        <div class="row form-group align-items-start">
                            <label for="services" class="col-md-4 col-form-label text-md-right">Servizi premium</label>
                            <div class="col-md-6 col-form-label">
                                <div class="container ml-1">
                                    <div class="row">
                                        @foreach ($services as $service)
                                            @if ($service['type'] == 'premium')
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="{{$service->name}}" value="{{$service->id}}" name="services[]" {{in_array($service->id, old('services', [])) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="{{$service->name}}">
                                                        {{$service->name}}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                        @error('services')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- Typologies --}}
                        <div class="form-group row align-items-center">
                            <label for="typologies" class="col-md-4 col-form-label text-md-right">Tipologia</label>
                            <div class="col-md-6">
                                <select class="form-control col-form-label light-radius" id="typologies" name="typologies">
                                    <option>Seleziona una tipologia:</option>
                                    @foreach ($typologies as $typology)
                                        <option value="{{$typology->id}}" {{old('typology_id') == $typology->id ? 'selected' : ''}}>{{$typology->name}}</option>
                                    @endforeach
                                </select>
                                @error('typologies')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        {{-- visibility --}}
                        <div class="form-group row align-items-center">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input @error('is_visible') is-invalid @enderror" id="visible" name="is_visible" {{old('is_visible') ? 'checked' : ''}}>
                                    <label class="form-check-label" for="visible">Visibile</label>
                                    @error('is_visible')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>  
                        <div class="container">
                            <div class="row justify-content-between">
                                <a class="btn col-5" href="{{route('user.houses.index')}}">Annulla</a>
                                <button class="btn col-5" type="submit">Inserisci</button>
                            </div>
                        </div>
                    </div> 
                    </form>
                </div>
                
        </div>
    </div>
</div>
@endsection