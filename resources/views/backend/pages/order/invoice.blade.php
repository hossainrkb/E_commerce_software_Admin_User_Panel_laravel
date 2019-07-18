<html>
  <head>

    <title>{{$odr->id}}</title>
      <link rel="stylesheet" href="{{asset('css/admin_style.css')}}">
      <style>
        .content-wrapper{
          background-color: #FFF;
        }
        .invoice-header {
    background: #f7f7f7;
    padding: 10px 20px 10px 20px;
    border-bottom: 1px solid gray;
}
.invoice-right-top h3{
    padding-right: 20px;
    margin-top: 20px;
    font-size: 50px;
    color: #ec5d01!important;
    font-family: auto;
}
.invoice-left-top{
  padding-left: 20px;
  padding-top: 20px;
  border-left: 4px solid #ec5d01;
}
thead{
  background: #ec5d01!important;
  color: #FFF;
}

.authority h5{
  margin-top: -10px;
  color: #ec5d01;
}
.thanks h4{
  margin-top: 20px;
  color: #ec5d01;
  font-size: 25px;
  font-family: serif;
  font-weight: normal;
}
      </style>
  </head>
  <body>
      <div class="content-wrapper">

        <div class="invoice-header">
          <div class="float-left site-logo">
    <img class="img img-circle" src="{{asset('images/rkb.jpg' )}}" style=" border-radius: 50%;" width="50">
          </div>
          <div class="float-right site-address">
            <h4>rkbECON</h4>
            <p>Block:B, Halishahor, Chittagong</p>
            <p>Phone: <a href="">01923144496</a> </p>
            <p>Email: <a href="">holalaravel@gmail.com</a> </p>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="invoice-description">
          <div class="invoice-left-top float-left">
            <h6>Invoice To</h6>
            <h3>{{$odr->name}}</h3>
            <div class="address">
                <p>  <strong>Shipping Address: </strong> {{$odr->shipping_address}}</p>
                <p>  <strong>Phone No: </strong> {{$odr->phone_no}}</p>
                <p>  <strong>E-mail: </strong> {{$odr->email}}</p>
            </div>
          </div>
          <div class="invoice-right-top float-right">
              <h3>Invoice #{{$odr->id }}</h3>
              <p>{{$odr->created_at}}</p>
          </div>
          <div class="clearfix"></div>
        </div>


        <div class="">
      <h3>Products</h3>
            @if($odr->carts->count()>0)
            <table class=" table table-hover table-striped" >
              <thead>

                <tr>
                  <td>#SL</td>
                  <td>Product Name</td>
                  <td>Quantity</td>
                  <td>Unit Price</td>
                  <td>Sub total Price</td>
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
                  {{$cart->product_quantity}}
                  </td>
                  <td>{{$cart->product->price}} Tk.</td>
                  @php
                  $total_Price += $cart->product->price*$cart->product_quantity;
                  @endphp
                  <td>{{$cart->product->price*$cart->product_quantity }} Tk.</td>
                </tr>

                @endforeach


              </tbody>
              <tfoot>
                <tr>
                  <td colspan="4" style="text-align:right" >Discount:</td>
                  <td colspan="" style="text-align:left;font-weight:bold">{{$odr->custom_discount}} Tk.</td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align:right" >Shipping Cost:</td>
                  <td colspan="" style="text-align:left;font-weight:bold">{{$odr->shipping_charge}} Tk.</td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align:right" >Total Amount:</td>
                  <td colspan="" style="text-align:left;font-weight:bold">{{$total_Price +$odr->shipping_charge-$odr->custom_discount }} Tk.</td>
                </tr>
              </tfoot>
            </table>




            @else
              <div class="alert alert-danger">
                No cart item available
              </div>
            @endif

            <div class="thanks mt-3">
              <h4>Thanks For staying with rkbECON !</h4>
            </div>
            <div class="authority float-right mt-5">
              <p>----------------------------------</p>
              <h5>Authority Signeture:</h5>
            </div>
            <div class="clearfix"></div>


        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      


  </body>
</html>
