@extends('backend.layouts.master')
@section ('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">

      <div class="card-header">
          Edit PRODUCT
      </div>
      <div class="card-body">
        <form action="{{route('admin.product.update', $e_pro->id)}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          @include('backend.partials.messages')
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title" value="{{ $e_pro->title }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $e_pro->description }}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="number" name="price" value="{{ $e_pro->price }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Price">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Quantity</label>
    <input type="number" name="qty" value="{{ $e_pro->quantity }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Quantity">

  </div>
  <div class="form-group">
    <label for="product_image">Product Image</label>
  <div class="row">
    <div class="col-md-4">
        <input type="file" name="pro_img[]" class="form-control" id="product_iamge" >
    </div>
    <div class="col-md-4">
        <input type="file" name="pro_img[]" class="form-control" id="product_iamge" >
    </div>
    <div class="col-md-4">
        <input type="file" name="pro_img[]" class="form-control" id="product_iamge" >
    </div>
  </div>

  </div>

  <button type="submit" class="btn btn-outline-success">Update Product</button>
</form>
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
