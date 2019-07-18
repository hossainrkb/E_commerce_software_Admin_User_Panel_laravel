@extends('backend.layouts.master')
@section ('content')
<div class="main-panel">
  <div class="content-wrapper">
  <div class="card card-body">
    <h3>WELCOME TO ADMIN PANEL</h3>
    <br><br>
    <p>
<a href="{{route('index')}}" target="_blank" class="btn btn-outline-primary">GO UP YOUR MAIN SITE!</a>
    </p>
</div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <footer class="footer">
    <div class="container-fluid clearfix">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
        <a href="#" target="_blank"></a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
        <i class="mdi mdi-heart text-danger"></i>
      </span>
    </div>
  </footer>
  <!-- partial -->
</div>
@endsection
