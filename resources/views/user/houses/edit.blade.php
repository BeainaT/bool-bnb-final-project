@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Modifica appartamento</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('user.houses.update', $house->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">nome alloggio</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $house->name) }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- rooms --}}
                        <div class="form-group row">
                            <label for="rooms" class="col-md-4 col-form-label text-md-right">numero stanze</label>
                            <div class="col-md-6">
                                <input id="rooms" type="number" min="1" class="form-control @error('number_rooms') is-invalid @enderror" name="number_rooms" value="{{ old('number_rooms', $house->number_rooms) }}" required autocomplete="number_rooms" autofocus>
                                @error('number_rooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- beds --}}
                        <div class="form-group row">
                            <label for="beds" class="col-md-4 col-form-label text-md-right">numero letti</label>
                            <div class="col-md-6">
                                <input id="beds" type="number" min="1" class="form-control @error('number_beds') is-invalid @enderror" name="number_beds" value="{{ old('number_beds', $house->number_beds) }}" required autocomplete="number_beds" autofocus>
                                @error('number_beds')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- bathrooms --}}
                        <div class="form-group row">
                            <label for="bath" class="col-md-4 col-form-label text-md-right">numero bagni</label>
                            <div class="col-md-6">
                                <input id="bath" type="number" min="1" class="form-control @error('number_bathrooms') is-invalid @enderror" name="number_bathrooms" value="{{ old('number_bathrooms', $house->number_bathrooms) }}" required autocomplete="number_bathrooms" autofocus>
                                @error('number_bathrooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- square meters --}}
                        <div class="form-group row">
                            <label for="width" class="col-md-4 col-form-label text-md-right">metri quadri</label>
                            <div class="col-md-6">
                                <input id="width" type="number" min="1" class="form-control @error('square_meters') is-invalid @enderror" name="square_meters" value="{{ old('square_meters', $house->number_rooms) }}" required autocomplete="square_meters" autofocus>
                                @error('square_meters')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- address --}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">indirizzo</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $house->address) }}" required autocomplete="address" autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- image --}}
                        <div class="form-group row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">immagine</label>
                            <div class="col-md-6">
                                <img style="width:100px;" src="{{asset('storage/'.$house->image)}}" alt="">
                                <input id="img" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image')}}" required autocomplete="image" autofocus>
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
                                <textarea id="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus rows="5">{{ old('description',  $house->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- price --}}
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">prezzo</label>
                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price',  $house->price) }}" autocomplete="price" autofocus>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- visibility --}}
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input @error('is_visible') is-invalid @enderror" id="visible" name="is_visible" {{old('is_visible', $house->is_visible) ? 'checked' : ''}}>
                                    <label class="form-check-label" for="visible">Pubblica</label>
                                    @error('is_visible')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit">Modifica</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection