@extends('welcome')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-2">
                    <h2>Promozione</h2>
                </div>
                <div class="card-body">
                    <div class="container">
                        <p>Hai scelto la promozione {{$promote->name}}.</p>
                        <p>La struttura {{$house->name}} resterà in evidenza per {{$promote->duration}} ore dopo aver effettuato il pagamento di € {{$promote->price}}</p>
                    </div>
                    <hr>
                    <a class="btn col-5" href="{{route('user.houses.index')}}">Torna alla lista</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    
    
    
