@extends ('frontend.layout.master');
@section('contact')
{{--Start sidebar + contant--}}
<div class="container margin-top-20">
  <div class="row">
    <div class="col-md-4">
@include('frontend.partials.productsidebar')
    </div>
    <div class="col-md-8">
      <div class="widget">
          @include('backend.partials.messages')
        <h3>All Products in <span class="badge badge-info">{{$category->name}}</span> </h3>
        @php
         $holapro= $category->product()->paginate(9);
        @endphp

        @if($holapro->count() >0)
            @include('frontend.pages.product.partials.all_product')
            @else
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>

                  No product available in this category!

            </div>
        @endif

      </div>

    </div>
  </div>
</div>


{{--End sidebar + contant--}}
@endsection
