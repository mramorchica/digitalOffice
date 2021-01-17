@extends('layouts.admin-lte')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1>Open Positions Management</h1>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Open Positions List</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      @include('includes.flash_msgs')
      <a href="{{url('/jobs/create')}}" class="btn btn-success"> New Open Position</a> 
      <table id="jobs-table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Title</th>
            <th>Location</th>
            <th>Position</th>
            <th>Department</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($jobs as $job)
          <tr>
            <td>{{ $job->title }}</td>
            <td>{{ $job->location }}</td>
            <td>
              @if($job->position)
                {{ $job->position->name }}
              @else
               -
              @endif
            </td>
            <td>{{ $job->department->name }}</td>
            <td>{{ $job->start_date }}</td>
            <td>{{ $job->end_date }}</td>
            <td>
              <form action='{{ url("/jobs/$job->id") }}' method="POST">
                <a href='{{url("/jobs/$job->id/edit")}}' class="btn btn-warning" title='Edit'> 
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