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
        <h3>Searched Products For- <span class="badge badge-success">{{$search}}</span> </h3>
        @include('frontend.pages.product.partials.all_product')

      </div>

    </div>
  </div>
</div>


{{--End sidebar + contant--}}
@endsection
