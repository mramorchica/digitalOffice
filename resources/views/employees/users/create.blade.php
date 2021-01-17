@extends('layouts.admin-lte')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1>Create a New User</h1>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">User Data</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      @include('includes.validation_errors')
      <form method="post" action="{{url('users')}}" class="form-horizontal">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Names</label>
            <div class="col-sm-10">
              <input type="text" name="name" min="8" class="form-control" id="name" value="{{old('name')}}" placeholder="Name" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" id="name" value="{{old('email')}}" placeholder="Email" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" id="phone" value="{{old('phone')}}" placeholder="Phone" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="department_id" class="col-sm-2 col-form-label">Department</label>
            <div class="col-sm-10">
              <select name="department_id" id="department_id" class="form-control">
                <option value="" required></option>
                @foreach($departments as $department)
                  <option value="{{$department->id}}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{$department->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="position_id" class="col-sm-2 col-form-label">Position</label>
            <div class="col-sm-10">
              <select name="position_id" id="position_id" class="form-control">
                <option value="" required></option>
                @foreach($positions as $position)
                  <option value="{{$position->id}}" {{ old('position_id') == $position->id ? 'selected' : '' }}>{{$position->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="level" class="col-sm-2 col-form-label">Level</label>
            <div class="col-1">
              <input type="number" name="level" min="1" max="10" class="form-control" id="level" value="{{old('level')}}" placeholder="Level">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <a href="{{url('users')}}" class="btn btn-default">Cancel</a>
              <input type="submit" name="save" value="Save" class="btn btn-success float-right">
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
@endsection

@push('footer_scripts')
<script type="text/javascript">
  console.log('test footer scripts!')
</script>
@endpush