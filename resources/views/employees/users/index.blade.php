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
      <a href="{{url('/users/create')}}" class="btn btn-success"> New User</a> 
      <table id="users-table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Names</th>
            <th>Position</th>
            <th>Department</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->position->name }}</td>
            <td>{{ $user->department->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <form action='{{ url("/users/$user->id") }}' method="POST">
                <a href='{{url("/users/$user->id/edit")}}' class="btn btn-warning" title='Edit'> 
                  Edit
                </a>

                @csrf
                @method('DELETE')
                <button class="btn btn-danger deleteBtn" title='Delete' > Delete </button>
              </form>
            </td>
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
@endpush