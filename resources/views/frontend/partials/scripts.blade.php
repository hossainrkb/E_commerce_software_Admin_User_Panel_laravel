
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>





<script type="text/javascript">

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  function addToCart(hola_product_id){
    $.post( "http://localhost/rkb_econ/public/api/carts/store",
    { product_id: hola_product_id

   })
  .done(function( data ) {
    data= JSON.parse(data);
    if(data.status=='success' ){
      //Toast
  //alertify("hola");
 alert("Product has been added! Total Items: " + data.totalItems+ 'To Checkout <a href="{{route('carts')}}">go to checkout page</a>  ');

      $("#totalitems").html(data.totalItems);
    }

  });
  }
</script>
