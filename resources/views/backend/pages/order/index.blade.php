@extends('backend.layouts.master')
@section ('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">

      <div class="card-header">
          MANAGE ORDERS
      </div>
      <div class="card-body">
          @include('backend.partials.messages')
        <table class="table table-hover table-striped text-center" id="data-table">
    <thead>
      <tr>
        <td><b>SL</b></td>
        <td><b>Order ID</b></td>
        <td><b>Orderer Name</b></td>
        <td><b>Orderer Phon No.</b></td>
        <td colspan=""><b>Status</b></td>
        <td colspan=""><b>Actions</b></td>
      </tr>
    </thead>

        <tbody>
          @foreach ($odrs as $orders)
          <tr>
            <td>{{ $loop->index+1 }}</td>
            <td> #rkb{{$orders->id }} </td>
            <td> {{$orders->name }} </td>
            <td> {{$orders->phone_no }} </td>
            <td>
              @if($orders->is_seen_by_admin==1)
              <span style="color:blue">Seen</span>
              @else
              <span style="color:blue">Unseen</span>
              @endif
              @if($orders->is_paid==1)
              <span style="color:red"> ,Paid</span>
              @else
              <span style="color:red"> ,Unpaid</span>
              @endif
              @if($orders->is_completed==1)
              <span style="color:green"> ,Completed</span>
              @else
              <span style="color:green"> ,Uncomplete</span>
              @endif
            </td>


            <td> <a target="_blank" href="{{ route ('admin.orders.show', $orders->id) }}" class="btn btn-outline-primary btn-sm"> View</a>
              <a href="#deleteModal{{ $orders->id }}" data-toggle="modal"  class="btn btn-outline-danger btn-sm"> Delete</a>

              <!-- DeleteModal -->
              <div class="modal fade" id="deleteModal{{ $orders->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Are you sure to permanently delete this? </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{route('admin.orders.delete', $orders->id)}}" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-danger" >ok,Permanently Delete This Order?</button>

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


          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tfoot>

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
