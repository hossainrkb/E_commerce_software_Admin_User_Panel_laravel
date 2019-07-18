<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{asset('images/rkb.jpg')}}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">Rkb</p>
            <div>
              <small class="designation text-muted">Manager</small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        </div>
        <button class="btn btn-success btn-block">Online
          <i class="mdi mdi-plus"></i>
        </button>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link"href="{{route('admin.dash')}}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>




    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="false" aria-controls="brand">
        <i class="menu-icon mdi mdi-restart"></i>
        <span class="menu-title">  <i class="fas fa-angle-double-right "></i> Manage Order</span>

      </a>
      <div class="collapse" id="order">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route ('admin.orders')}}"> Order List</a>
          </li>


        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#brand" aria-expanded="false" aria-controls="brand">
        <i class="menu-icon mdi mdi-restart"></i>
        <span class="menu-title">  <i class="fas fa-angle-double-right "></i> Manage Brand</span>

      </a>
      <div class="collapse" id="brand">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route ('admin.brand')}}"> Brand List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route ('admin.brand.create')}}"> Create Brand </a>
          </li>

        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth1">
        <i class="menu-icon mdi mdi-restart"></i>
        <span class="menu-title"><i class="fas fa-angle-double-right "></i> Manage Products</span>

      </a>
      <div class="collapse" id="auth1">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route ('admin.products')}}"> Products List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route ('admin.product.create')}}"> Create Product </a>
          </li>

        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="menu-icon mdi mdi-restart"></i>
        <span class="menu-title"><i class="fas fa-angle-double-right "></i> Manage Category</span>

      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route ('admin.categories')}}"> Category List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route ('admin.categories.create')}}"> Create Category </a>
          </li>

        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#division" aria-expanded="false" aria-controls="brand">
        <i class="menu-icon mdi mdi-restart"></i>
        <span class="menu-title"><i class="fas fa-angle-double-right "></i> Manage Division</span>

      </a>
      <div class="collapse" id="division">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route ('admin.division')}}"> Division List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route ('admin.division.create')}}"> Create Division </a>
          </li>

        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#district" aria-expanded="false" aria-controls="brand">
        <i class="menu-icon mdi mdi-restart"></i>
        <span class="menu-title"><i class="fas fa-angle-double-right "></i> Manage District</span>

      </a>
      <div class="collapse" id="district">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route ('admin.district')}}"> District List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route ('admin.district.create')}}"> Create District </a>
          </li>

        </ul>
      </div>
    </li>
    <li class="nav-item " aria-expanded="false" aria-controls="brand">
      <a class="nav-link " >

        <form id="" class=""  action="{{ route('admin.logout') }}" method="POST" >
            @csrf
            <input type="submit" class="btn btn-sm btn-outline-danger" name="" value="Logout">
        </form>
      </a>

    </li>
  </ul>
</nav>
