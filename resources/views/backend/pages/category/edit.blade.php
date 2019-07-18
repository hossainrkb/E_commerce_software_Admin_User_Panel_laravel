@extends('backend.layouts.master')
@section ('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">

      <div class="card-header">
          Edit CATEGORY
      </div>
      <div class="card-body">
        <form action="{{route('admin.category.update', $edit_cat->id)}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          @include('backend.partials.messages')
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" name="name" value="{{ $edit_cat->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $edit_cat->description }}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Parent</label>
    <select class="form-control" name="parent_id">
      <option value="">Select Parent Category!</option>
      @foreach ($cat as $category)
      <option value="{{$category->id}}"  @if($edit_cat->parent_id==$category->id) selected @endif > {{$category->name}} </option>

      @endforeach

    </select>

  </div>

<div class="form-group">
  <label for="category_image">Old Category Image</label>
      <img height="100px" width="100px" class="card-img-top feature-img" src="{{asset('images/categories/'. $edit_cat->image ) }}" alt="Card image">
</div>
<div class="form-group">
  <label for="product_image">Add Category Image</label>
      <input type="file" name="cat_img" class="form-control" id="product_iamge" >

</div>

  <button type="submit" class="btn btn-outline-success">Update Category</button>
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
