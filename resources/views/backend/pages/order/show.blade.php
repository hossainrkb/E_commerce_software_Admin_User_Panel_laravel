@extends('backend.layouts.master')
@section ('content')
<style media="screen">
.form-control {
  color: white !important;
}
  }
</style>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card card-body">
      <h2>View order #rkb{{$odr->id }}</h2>
        @include('backend.partials.messages')
      <hr>


    <div class="row">
      <div class="col-md-7 border-right">
        <h4>Orderer Information</h4>
        <hr>
      <p>  <strong>Orderer Name: </strong> {{$odr->name}}</p>
      <p>  <strong>Phone No: </strong> {{$odr->phone_no}}</p>
      <p>  <strong>E-mail: </strong> {{$odr->email}}</p>
      <p>  <strong>Shipping Address: </strong> {{$odr->shipping_address}}</p>
      </div>
      <div class="col-md-5">
        <p class="mt-5"> <strong>Payment Method: </strong> {{$odr->payment->name}}</p>
        <p class=""> <strong>Order Payment TID: </strong> {{$odr->transaction_id}}</p>
      </div>

    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        @if($odr->carts->count()>0)
        <table class=" table text-center" >
          <thead>
            <tr>
              <td colspan="7">

              </td>
            </tr>
            <tr class="" style="background:#ec5d01!important;color:white">
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

            @foreach ($odr->carts as $cart)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$cart->product->title}}</td>
              <td>
                @if(!is_null($cart->product->images))
                  <img class="" src="{{asset('images/products/'.$cart->product->images->first()->image )}}" width="50px" height="34px" >
                @endif
                  </td>
              <td>
              <form  action="{{route('carts.update', $cart->id)}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-8">
        <input  type="number" class="form-control" min="1" name="product_quantity" value="{{$cart->product_quantity}}">
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
        <div class="" style="float:right">
          <form class=""  action="{{route('admin.order.charge', $odr->id)}}" method="post">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6 text-right">
                <label for="shipping_charge">Shipping Charge</label>
              </div>
              <div class="col-md-6">
                <input type="number" id="shipping_charge" name="shipping_charge" value="{{$odr->shipping_charge}}" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 text-right">
                <label for="discount">Discount</label>
              </div>
              <div class="col-md-6">
              <input type="number" id="discount" name="custom_discount" value="{{$odr->custom_discount}}" class="form-control">
              </div>
            </div>
<br>
            <div class="row">
              <div class="col-md-8">

              </div>
              <div class="col-md-4">
                  <button type="submit" class="btn btn-info  btn-sm " >Update?</button>
              </div>
            </div>


          </form>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>


        <hr>
        <div class="" style="float:right" >
          <form class="form-inline" style="display:inline-block !important" action="{{route('admin.order.completed', $odr->id)}}" method="post">
            {{ csrf_field() }}
          @if($odr->is_completed==1)
            <button type="submit" class="btn btn-danger btn-sm" >Cencel order?</button>
            @else
            <button type="submit" class="btn btn-success btn-sm" >Make Order Complete?</button>
          @endif
          </form>
          <form class="form-inline" style="display:inline-block !important" action="{{route('admin.order.paid', $odr->id)}}" method="post">
            {{ csrf_field() }}
            @if($odr->is_paid==1)
              <button type="submit" class="btn btn-danger  btn-sm" >Cencel Paid?</button>
              @else
              <button type="submit" class="btn btn-success  btn-sm" >Make Paid?</button>
            @endif
          </form>
          <a href="{{route('admin.order.invoice', $odr->id)}}" target="_blank" class="btn btn-sm btn-primary">Generate Invoice</a>
          </div>

        @else
          <div class="alert alert-danger">
            No cart item available
          </div>
        @endif
      </div>
    </div>

    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <footer class="footer">
    <div class="container-fluid clearfix">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
        <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
        <i class="mdi mdi-heart text-danger"></i>
      </span>
    </div>
  </footer>
  <!-- partial -->
</div>
@endsection
