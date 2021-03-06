@extends('layouts.admin-lte')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1>Users Management</h1>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Users List</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      @include('includes.flash_msgs')
      
      @if(Auth::user()->role == config('consts.ROLE_ADMIN'))
        <a href="{{url('/users/create')}}" class="btn btn-success"> New User</a> 
      @endif
      <table id="users-table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Names</th>
            <th>User Role</th>
            <th>Position</th>
            <th>Department</th>
            <th>Phone</th>
            <th>Email</th>
            @if(Auth::user()->role == config('consts.ROLE_ADMIN'))
              <th>Action</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->position->name }}</td>
            <td>{{ $user->department->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->email }}</td>
            @if(Auth::user()->role == config('consts.ROLE_ADMIN'))
              <td>
                <form action='{{ url("/users/$user->id") }}' method="POST">
                  <a href='{{url("/users/$user->id/edit")}}' class="btn btn-warning" title='Edit'> 
                    Edit
                  </a>

                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger delete-btn" title='Delete' > Delete </button>
                </form>
              </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
@endsection

@push('footer_scripts')
  <script src="{{asset('js/custom.js')}}"></script>

  <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  <script type="text/javascript">
        $(function () {
            $("#users-table").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
  </script>
@endpush