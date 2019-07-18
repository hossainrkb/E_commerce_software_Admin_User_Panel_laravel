@extends('backend.layouts.master')
@section ('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">

      <div class="card-header">
          MANAGE PRODUCT
      </div>
      <div class="card-body">
          @include('backend.partials.messages')
        <table class="table table-hover table-striped ">
          <tr>
            <td><b>SL</b></td>
            <td><b>Category Name</b></td>
            <td><b>Parent Category</b></td>
            <td><b>Image</b></td>
            <td colspan="2"><b>Actions</b></td>
          </tr>
          @php $i=1; @endphp
          @foreach ($cat as $category)
          <tr>
            <td>{{$i }}</td>
            <td> {{$category->name }} </td>
            <td>
              @if($category->parent_id == NULL)
              Primary Category it is!
              @else
                {{ $category->p->name }}
               @endif
            </td>
            <td>
<img class="card-img-top feature-img" src="{{asset('images/categories/'. $category->image ) }}" alt="Card image">
            </td>
            <td> <a href="{{ route ('admin.category.edit', $category->id) }}" class="btn btn-outline-primary btn-sm"> Edit</a>
              <a href="#deleteModal{{ $category->id }}" data-toggle="modal"  class="btn btn-outline-danger btn-sm"> Delete</a>

              <!-- DeleteModal -->
              <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Are you sure to permanently delete this? </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{route('admin.category.delete', $category->id)}}" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-danger" >ok,Permanently Delete This Category?</button>

                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                  </div>
                </div>
              </div>

             </td>
          </tr>

          @php $i++; @endphp
          @endforeach

        </table>
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
