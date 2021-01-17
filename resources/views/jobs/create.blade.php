@extends('layouts.admin-lte')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1>Add a New Open Position</h1>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Open Position Data</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      @include('includes.validation_errors')
      <form method="post" action="{{url('jobs')}}" class="form-horizontal">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}" placeholder="Title" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="location" class="col-sm-2 col-form-label">Location</label>
            <div class="col-sm-10">
              <input type="text" name="location" class="form-control" id="location" value="{{old('location')}}" placeholder="Location" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <textarea name="description" id="description" value="{{old('description')}}"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="requirements" class="col-sm-2 col-form-label">Requirements</label>
            <div class="col-sm-10">
              <textarea name="requirements" id="requirements" value="{{old('requirements')}}"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="responsibilities" class="col-sm-2 col-form-label">Responsibilities</label>
            <div class="col-sm-10">
              <textarea name="responsibilities" id="responsibilities" value="{{old('responsibilities')}}"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="our_offer" class="col-sm-2 col-form-label">Our offer</label>
            <div class="col-sm-10">
              <textarea name="our_offer" id="our_offer" value="{{old('our_offer')}}"></textarea>
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
            <label for="how_to_apply" class="col-sm-2 col-form-label">How to apply</label>
            <div class="col-1">
              <input type="text" name="how_to_apply" class="form-control" id="how_to_apply" value="{{old('how_to_apply')}}" placeholder="How to apply">
            </div>
          </div>

          <div class="form-group row">
            <label for="start_date" class="col-sm-2 col-form-label">Posting Start Date</label>
            <div class="col-1">
              <input type="date" name="start_date" class="form-control" id="start_date" value="{{old('start_date')}}" placeholder="Start Date">
            </div>
          </div>

          <div class="form-group row">
            <label for="end_date" class="col-sm-2 col-form-label">Posting End Date</label>
            <div class="col-1">
              <input type="date" name="end_date" class="form-control" id="end_date" value="{{old('end_date')}}" placeholder="End Date">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <a href="{{url('jobs')}}" class="btn btn-default">Cancel</a>
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
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

<script type="text/javascript">
  ClassicEditor.create( document.querySelector( '#description' ) ).catch( error => {console.error( error );} );
  ClassicEditor.create( document.querySelector( '#requirements' ) ).catch( error => {console.error( error );} );
  ClassicEditor.create( document.querySelector( '#responsibilities' ) ).catch( error => {console.error( error );} );
  ClassicEditor.create( document.querySelector( '#our_offer' ) ).catch( error => {console.error( error );} );
</script>
@endpush