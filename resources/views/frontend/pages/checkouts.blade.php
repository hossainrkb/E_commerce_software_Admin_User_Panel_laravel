@extends('frontend.layout.master');
@section('contact')
<div class="container mt-2">
<div class="card card-body">
  <h2>Confirm Items</h2>
  <hr>
<div class="row">
  <div class="col-md-7 border-right">
    @foreach (App\Models\cart::totalCart() as $cart)
    <p>
  {{$cart->product->title}}
  - <strong>{{$cart->product->price}} Taka </strong>
  - {{$cart->product_quantity}} items
    </p>
    @endforeach
  </div>
  <div class="col-md-5">
    @php
    $total_Price = 0;
    @endphp
    @foreach (App\Models\cart::totalCart() as $cart)
    @php
    $total_Price += $cart->product->price*$cart->product_quantity;
    @endphp
    @endforeach
    <p>Total price: <strong>{{$total_Price}} Taka</strong> </p>
    <p>Total price along with Shipping cost: <strong>{{$total_Price + App\Models\setting::first()->shipping_cost}} Taka</strong> </p>

  </div>

</div>
    <p>
  <a href="{{route('carts')}}">Change cart items..</a>
    </p>
</div>
<div class="card card-body mt-2">
  <h2>Shipping Address</h2>
  <hr>
  @include("backend.partials.messages")
  <form method="POST" action="{{ route('checkout.store') }}">
      @csrf

      <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Receiver Name') }}</label>

          <div class="col-md-6">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::check() ? Auth::user()->first_name : '' }}"  autocomplete="name" autofocus>

              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>


      <div class="form-group row">
          <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Cell Number') }}</label>

          <div class="col-md-6">
              <input id="phone_no" type="text" class="form-control @error('name') is-invalid @enderror" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}"  autocomplete="name" autofocus>

              @error('phone_no')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>

      <div class="form-group row">
          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

          <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}"  autocomplete="email">

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>


      <div class="form-group row">
          <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>

          <div class="col-md-6">
              <input id="shipping_address" type="text" class="form-control @error('name') is-invalid @enderror" name="shipping_address" value="{{ Auth::check() ? Auth::user()->shipping_address : '' }}" required autocomplete="name" autofocus>

              @error('shipping_address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>
      <div class="form-group row">
          <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Peyment Method') }}</label>

          <div class="col-md-6">
            <select class="form-control" name="payment_method_id" required id="payments">
              <option value="">Select payment procedure!</option>
              @foreach ($payments as $payment)
              <option value="{{$payment->short_name}}"   > {{$payment->name}} </option>

              @endforeach

            </select>
            @foreach ($payments as $payment)

              @if($payment->short_name =='cash_in')
                <div class="hidden" id="payment_{{$payment->short_name}}" >
                <div class="">
                  <h3 style="color:#ffc107">{{$payment->name}} Payment</h3>
                  <h3>There is nothing necessary for you</h3>
                  <small>Please pay your payment on delivary day, Thank you</small>
                </div>
                </div>

              @else
              <div class="hidden" id="payment_{{$payment->short_name}}" >
                <h3 style="color:#ffc107">{{$payment->name}} Payment</h3>
                <p>
                  <strong>{{$payment->name}} No: {{$payment->no}}</strong>
                  <br>
                  <strong>Account type: {{$payment->type}}</strong>
                </p>
                <div class="alert alert-success">
                  Please send the above money to this Number and Place Your Transaction key!
                </div>
              </div>
              @endif
            @endforeach
            <input type="text" placeholder="Enter transaction key.." name="transaction_id" id="transaction_id" class="form-control hidden" value="">




            @section('script')
            <script type="text/javascript">
            $("#payments").change(function(){
              $payment_method =   $("#payments").val();
              if($payment_method == 'cash_in'){
                  $("#payment_cash_in").removeClass('hidden');
                  $("#payment_bkash").addClass('hidden');
                  $("#payment_rocket").addClass('hidden');
                  $("#transaction_id").addClass('hidden');
              }
              else if ($payment_method == 'bkash') {

                $("#payment_bkash").removeClass('hidden');
                $("#transaction_id").removeClass('hidden');
                $("#payment_cash_in").addClass('hidden');
                $("#payment_rocket").addClass('hidden');
              }
              else if ($payment_method == 'rocket') {
                $("#payment_rocket").removeClass('hidden');
                $("#transaction_id").removeClass('hidden');
                $("#payment_cash_in").addClass('hidden');
                $("#payment_bkash").addClass('hidden');

              }

            })

            </script>
            @endsection

          </div>
      </div>

      <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-outline-info btn-sm">
                  {{ __('Order Now') }}
              </button>
          </div>
      </div>
  </form>
</div>
</div>
@endsection
