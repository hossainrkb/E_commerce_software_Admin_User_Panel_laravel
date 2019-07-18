@extends('backend.layouts.master')
@section ('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">

      <div class="card-header">
          ADD BRAND
      </div>
      <div class="card-body">
        <form action="{{route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          @include('backend.partials.messages')
  <div class="form-group">
    <label for="exampleInputEmail1">Brand Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>


  <div class="form-group">
    <label for="brand_iamge">Brand Image</label>
  <div class="row">
        <input type="file" name="brand_img" class="form-control" id="brand_iamge" >
  </div>
  </div>

  <button type="submit" class="btn btn-primary">Add New Brand?</button>
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
