@extends('frontend.pages.users.master');
@section('sub_content')
<div class="container">
  <h2>Welcom {{$user->first_name. ' '. $user->last_name}}</h2>
  <p>You can change your profie and everything from here...</p>
  <hr>
  <div class="row">
    <div class="col-md-4">
      <div class="card card-body mt-2 " style="cursor: pointer;" onclick="location.href='{{route('user.profile')}}'">
        <h4>Update Profile</h4>
      </div>
    </div>
  </div>
  </div>

@endsection
