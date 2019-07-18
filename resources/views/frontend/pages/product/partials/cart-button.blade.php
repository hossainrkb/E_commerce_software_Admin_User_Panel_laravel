<form class="form-inline" action="{{route('carts.store')}}" method="post">
@csrf
<input type="hidden" name="product_id" value="{{$product->id}}">
<button type="button" onclick="addToCart({{$product->id}})" class="btn btn-outline-info" name="button"><i class="fa fa-plus"></i> Add to Cart</button>

</form>
