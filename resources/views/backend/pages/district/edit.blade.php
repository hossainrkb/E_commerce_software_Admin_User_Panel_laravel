@extends('backend.layouts.master')
@section ('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">

      <div class="card-header">
          EDIT DISTRICT
      </div>
      <div class="card-body">
        <form action="{{route('admin.district.update', $edit_district->id)}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          @include('backend.partials.messages')
  <div class="form-group">
    <label for="exampleInputEmail1">District Name</label>
    <input type="text" name="name" value="{{ $edit_district->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Division</label>
    <select class="form-control" name="division_id">
      <option value="">Select Division!</option>
      @foreach ($division as $div)
      <option value="{{$div->id}}"  @if($edit_district->division_id==$div->id) selected @endif > {{$div->name}} </option>

      @endforeach

    </select>

  </div>
  <button type="submit" class="btn btn-outline-success">Update District</button>
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
