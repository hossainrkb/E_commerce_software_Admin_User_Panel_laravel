@extends('frontend.layout.master');
@section('contact')
<div class="container mt-2">
  <div class="row">
    <div class="col-md-4">
      <div class="list-group">
        <a href="#" class="list-group-item">
          <img src="{{App\Helpers\ImageHelper :: getUserImage(Auth::user()->id ) }}" class="img rounded-circle" style="width:100px">
        </a>
        <a href="#" class="list-group-item {{Route::is('user.dashboard')? 'active' : '' }}">Dashboard</a>
        <a href="#" class="list-group-item {{Route::is('user.profile')? 'active' : '' }}">Update Profile</a>

      </div>
    </div>
    <div class="col-md-8">
    <div class="card card-body">
        @include('backend.partials.messages')
        @yield('sub_content')

    </div>
    </div>
  </div>

  </div>
@endsection
