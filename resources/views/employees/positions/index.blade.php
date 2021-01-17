@extends('layouts.admin-lte')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1>Positions Management</h1>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Positions List</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      @include('includes.flash_msgs')
      <a href="{{url('/positions/create')}}" class="btn btn-success"> New Position</a> 
      <table id="positions-table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Level</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($positions as $position)
          <tr>
            <td>{{ $position->name }}</td>
            <td>{{ $position->type }}</td>
            <td>{{ $position->level }}</td>
            <td>
              <form action='{{ url("/positions/$position->id") }}' method="POST">
                <a href='{{url("/positions/$position->id/edit")}}' class="btn btn-warning" title='Edit'> 
                  Edit
                </a>

                @csrf
                @method('DELETE')
                <button class="btn btn-danger delete-btn" title='Delete' > Delete </button>
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