<div class="row">

@foreach ($holapro as $product)
  <div class="col-md-3">
    <div class="card" >
      @php $i=1 @endphp
      @foreach ($product->images as $holaimg)
      @if ($i>0)
      <a href="{{route('products.show',$product->slug)}}" target="_blank">
<img class="card-img-top feature-img" src="{{asset('images/products/'. $holaimg->image ) }}" alt="{{$product->title}}">
</a>
      @endif
      @php $i--; @endphp
      @endforeach
      <div class="card-body">
        <h4 class="card-title">
<a href="{{route('products.show',$product->slug)}}" target="_blank">{{$product->title}}</a>
        </h4>
        <p class="card-text">Taka- {{$product->price}}</p>
        @include('frontend.pages.product.partials.cart-button')
      </div>
    </div>
  </div>
  @endforeach

</div>
<div class="row">
  <div class="col-md-6">
    <div class="mt-4 pagination">
      {{ $holapro->links() }}
    </div>

  </div>
</div>
