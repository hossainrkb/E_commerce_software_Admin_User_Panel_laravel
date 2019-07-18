@extends('frontend.layout.master');
@section('contact')
<div class="container">
  <h2>Your Cart page</h2>
  <div class="card card-body text-center">
    @if(App\Models\cart::totalCart()->count()>0)
    <table class=" table text-center" >
      <thead>
        <tr>
          <td colspan="7">
            @include('backend.partials.messages')
          </td>
        </tr>
        <tr class="" style="background:#ffc107!important;color:white">
          <td>#SL</td>
          <td>Product Name</td>
          <td>Image</td>
          <td>Quantity</td>
          <td>Unit Price</td>
          <td>Sub total Price</td>
          <td>Delete</td>
        </tr>
      </thead>
      <tbody>
        @php
        $total_Price = 0;
        @endphp

        @foreach (App\Models\cart::totalCart() as $cart)
        <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$cart->product->title}}</td>
          <td>
            @if(!is_null($cart->product->images))
              <img class="" src="{{asset('images/products/'.$cart->product->images->first()->image )}}" width="50px" height="34px" >
            @endif
              </td>
          <td>
          <form action="{{route('carts.update', $cart->id)}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-8">
    <input type="number" class="form-control" min="1" name="product_quantity" value="{{$cart->product_quantity}}">
              </div>
              <div class="col-md-2">
    <button type="submit"  class="btn btn-outline-primary btn-md mt-1" name="button"> <i class="fa fa-check-circle"></i> </button>
              </div>
            </div>


          </form>
          </td>
          <td>{{$cart->product->price}} Tk.</td>
          @php
          $total_Price += $cart->product->price*$cart->product_quantity;
          @endphp
          <td>{{$cart->product->price*$cart->product_quantity }} Tk.</td>
          <td>
            <a href="#deleteModal{{ $cart->id }}" data-toggle="modal"  class="btn btn-outline-danger btn-md"> <i class="fa fa-trash"></i></a>
            <div class="modal fade" id="deleteModal{{ $cart->id }}" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to permanently delete this? </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('carts.delete', $cart->id)}}" method="post">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-outline-danger" >ok,Permanently Delete This Cart?</button>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                  </div>
                </div>
              </div>
            </div>
          </td>

        </tr>

        @endforeach


      </tbody>
      <tfoot>
        <tr>
          <td colspan="6" style="text-align:right" >Total Amount:</td>
          <td colspan="" style="text-align:left;font-weight:bold">{{$total_Price}} Tk.</td>
        </tr>
      </tfoot>
    </table>
    <div style="text-align:right">
      <a href="{{route('index')}}" class="btn btn-outline-primary btn-sm">Continue Shopping...</a>
    @if(Auth::check())

      <a href="{{route('checkout')}}" class="btn btn-outline-success btn-sm">CheckOut</a>
    @else
        <a href="{{route('cart.login')}}" class="btn btn-outline-danger btn-sm">Login for proceeding!</a>
    @endif
    </div>
    @else
      <div class="alert alert-danger">
        No cart item available
      </div>
    @endif
  </div>
  </div>
@endsection
