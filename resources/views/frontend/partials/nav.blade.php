<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{route('index')}}">rkb's Econ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('products')}}">Products</a>
        </li>
        <!--  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}" tabindex="-1" aria-disabled="true">Contact Us</a>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="GET">
          <!--  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          -->
          <div class="input-group mb-3">
          <input type="text" class="form-control" name="pro_search" placeholder="Product Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
          <input type="submit" class="btn btn-outline-secondary" type="button" id="basic-addon2">
          </div>
          </div>
          </form>
          </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item" style="margin-top:10px">
            <a  class="nav-link" href="{{ route('carts') }}">
              <span  class=""><i class="fa fa-shopping-cart"></i> <sup id="totalitems">{{ App\Models\cart::totalItem() }} </sup> </span>

            </a>
        </li>
          <!-- Authentication Links -->
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{App\Helpers\ImageHelper :: getUserImage(Auth::user()->id ) }}" class="img rounded-circle" style="width:40px">
                      {{ Auth::user()->first_name }}   {{ Auth::user()->last_name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                      <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                          {{ __('Deshboard') }}
                      </a>
                  </div>

              </li>
          @endguest
      </ul>

    </div>
  </div>

</nav>
