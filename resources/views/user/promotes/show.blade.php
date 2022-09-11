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
                    {{-- <div class="container">
                        <p>Hai scelto la promozione {{$promote->name}}.</p>
                        <p>La struttura {{$house->name}} resterà in evidenza per {{$promote->duration}} ore dopo aver effettuato il pagamento di € {{$promote->price}}</p>
                    </div>
                    <hr>
                    <a class="btn col-5" href="{{route('user.houses.index')}}">Torna alla lista</a> --}}
                    <div class="container">
                        <form action="{{route('user.promote.payment', ['promote' => $promote->id, 'house' => $house->id])}}" id="payment-form" method="post">
                            @csrf
                            <input type="hidden" name="house_id" value="{{$house->id}}">
                            <input type="hidden" name="amount" value="{{$promote->price}}">
                            <input type="hidden" name="promote_id" value="{{$promote->id}}">
                            <input type="hidden" name="name" value="{{$promote->name}}">
                            <input type="hidden" name="duration" value="{{$promote->duration}}">
                                <div id="bt-dropin"></div>
                            <input id="nonce" name="payment_method_nonce" type="hidden" />
                            <button class="btn mt-5" type="submit"><span>pagamento</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
<script >
  let form = document.querySelector('#payment-form');
  let client_token = "{{ $token }}";
  braintree.dropin.create({
    authorization: client_token,
    selector: '#bt-dropin',
  }, function (createErr, instance) {
    if (createErr) {
      console.log('Create Error', createErr);
      return;
    }
    form.addEventListener('submit', function (event) {
      event.preventDefault();
      instance.requestPaymentMethod(function (err, payload) {
        if (err) {
          console.log('Request Payment Method Error', err);
          return;
        }
        document.querySelector('#nonce').value = payload.nonce;
        form.submit();
      });
    });
  });
</script>
@endsection
    
    
    
