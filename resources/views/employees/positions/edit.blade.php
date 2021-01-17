@extends('layouts.admin-lte')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1>Edit Positions</h1>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Position Data</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      @include('includes.validation_errors')
      <form method="post" action='{{url("positions/$position->id")}}' class="form-horizontal">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="name" value="{{old('name', $position->name)}}" placeholder="Name" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <input type="text" name="description" class="form-control" id="description" value="{{old('description', $position->description)}}" placeholder="Description">
            </div>
          </div>

          <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10">
              <select name="type" class="form-control">
                <option value="" required></option>
                @foreach($positionTypes as $key => $value)
                  <option value="{{$key}}" {{ old('type', $position->type) == $key ? 'selected' : '' }}>{{$value}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="level" class="col-sm-2 col-form-label">Level</label>
            <div class="col-1">
              <input type="number" name="level" min="1" max="10" class="form-control" id="level" value="{{old('level', $position->level)}}" placeholder="Level" required>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <a href="{{url('positions')}}" class="btn btn-default">Cancel</a>
              <input type="submit" name="save" value="Update" class="btn btn-warning float-right">
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