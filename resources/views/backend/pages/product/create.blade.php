@extends('backend.layouts.master')
@section ('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">

      <div class="card-header">
          ADD PRODUCT
      </div>
      <div class="card-body">
        <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          @include('backend.partials.messages')
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Price">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Quantity</label>
    <input type="number" name="qty" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Quantity">
  </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Category</label>
      <select class="form-control" name="category_id">
        <option value="">Select Category!</option>
        @foreach (App\Models\category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent_cat)
        <option value="{{$parent_cat->id}}">{{$parent_cat->name}}</option>
        @foreach (App\Models\category::orderBy('name','asc')->where('parent_id', $parent_cat->id)->get() as $sub_cat)
        <option value="{{$sub_cat->id}}">-----> {{$sub_cat->name}}</option>
        @endforeach
        @endforeach

      </select>

    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Brand</label>
      <select class="form-control" name="brand_id">
        <option value="">Select Brand!</option>
        @foreach (App\Models\brand::orderBy('name','asc')->get() as $brand)
        <option value="{{$brand->id}}">{{$brand->name}}</option>

        @endforeach

      </select>

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

  <button type="submit" class="btn btn-primary">Submit</button>
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
