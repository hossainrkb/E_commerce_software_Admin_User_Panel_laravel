@extends('frontend.pages.users.master');
@section('sub_content')
<div class="container">
  <div class="card card-body mb-5">
    <form method="POST" action="{{ route('user.profile.update') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

            <div class="col-md-6">
                <input id="first_name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" required autocomplete="name" autofocus>

                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

            <div class="col-md-6">
                <input id="last_name" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ $user->last_name}}" required autocomplete="name" autofocus>

                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

            <div class="col-md-6">
                <input id="last_name" type="text" class="form-control @error('name') is-invalid @enderror" name="username" value="{{ $user->username}}" required autocomplete="name" autofocus>

                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Cell Number') }}</label>

            <div class="col-md-6">
                <input id="phone_no" type="text" class="form-control @error('name') is-invalid @enderror" name="phone_no" value="{{$user->phone_no }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}</label>

            <div class="col-md-6">
              <select class="form-control" name="division_id">
                <option value="">Select Division!</option>
                @foreach ($division as $div)
                <option value="{{$div->id}}"  @if($user->division_id==$div->id) selected @endif > {{$div->name}} </option>

                @endforeach

              </select>

            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>

            <div class="col-md-6">
              <select class="form-control" name="district_id">
                <option value="">Select District!</option>
                @foreach ($district as $dis)
                <option value="{{$dis->id}}"  @if($user->district_id==$dis->id) selected @endif > {{$dis->name}} </option>

                @endforeach

              </select>

            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Street Address') }}</label>

            <div class="col-md-6">
                <input id="street_address" type="text" class="form-control @error('name') is-invalid @enderror" name="street_address" value="{{ $user->street_address }}"  required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"   autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>



        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-outline-info btn-sm">
                    {{ __('Update Profile') }}
                </button>
            </div>
        </div>
    </form>
  </div>
  </div>

@endsection
