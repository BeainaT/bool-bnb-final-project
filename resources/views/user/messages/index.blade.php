@extends('welcome')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            <div class="card-header mb-2">
                <h2>Messaggi per i tuoi appartamenti</h2>
            </div>
            <div class="container py-1 messages">
                @if (count($messages))
                    @foreach ($messages as $message)
                        <div class="row">
                            <div class="col-lg-9 col-md-12">
                                <div class="row align-items-baseline">
                                    <div class="col-md-5">
                                        <span>appartamento:</span>
                                    </div>
                                    <div class="col-md-7">
                                        <h4>{{$message->house->name}}</h4>
                                    </div>
                                </div>
                                <div class="row align-items-baseline">
                                    <div class="col-md-5">
                                        <span>messaggio:</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{$message->text}}</p>
                                    </div>
                                </div>
                                <div class="row align-items-baseline">
                                    <div class="col-md-5">
                                        <span>inviato da:</span>
                                    </div>
                                    <div class="col-md-7">
                                        <h6>{{$message->sender_name}}</h6>
                                    </div>
                                </div>
                                <div class="row align-items-baseline">
                                    <div class="col-md-5">
                                        <span>contatto:</span>
                                    </div>
                                    <div class="col-md-7">
                                        <h6>{{$message->sender_email}}</h6>
                                    </div>
                                    <div class="col-md-12 py-2">
                                        <small>Messaggio del: {{$message->created_at->format('d-m-Y')}}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 pb-2">
                                <img src="{{asset($message->house->image_path)}}" alt="">
                            </div>
                        </div>
                        <form action="{{route('user.messages.destroy', $message->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn icon delete" href="#" data-toggle="modal" data-target="#ModalDelete{{$message->id}}"><i class="fa-solid fa-trash"></i></a>
                            @include('user.houses.modal.msg')  
                        </form>                        
                    @endforeach                    
                <hr>     
                @else                     
                    <p class="py-4">Non ci sono messaggi per questa struttura</p>
                @endif
                <div class="card-body d-flex justify-content-between">
                    <a class="btn col-5" href="{{route('user.dashboard')}}">Torna alla Dashboard</a>          
                    <a class="btn col-5" href="{{route('user.houses.index')}}">Torna alla Lista</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection