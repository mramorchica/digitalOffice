@extends('layouts.admin-lte')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1>Open Position: {{$job->title}}</h1>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
    </div>
    <div class="card-body p-0">

      <div>
        <h5>Location: {{$job->location}}</h5>
      </div>
      <div>
        <h5>Application start date: <span class="badge badge-info"> {{$job->start_date}} </span> Expire date: <span class="badge badge-info"> {{$job->end_date}} </span></h5>
      </div>
      @if(!empty($job->position))
        <div>
          <h5>Position: {{$job->position->name}}</h5>
        </div>
      @endif
      <div>
        <h5>Department: {{$job->department->name}}</h5>
      </div>
      <p></p>
      
      <div>
        <h3>Description</h3>
        {!! $job->description !!}
      </div>

      <div>
        <h3>Requirements</h3>
        {!! $job->requirements !!}
      </div>

      <div>
        <h3>Responsibilities</h3>
        {!! $job->resposibilities !!}
      </div>

      <div>
        <h3>Our offer</h3>
        {!! $job->our_offer !!}
      </div>

      @if(!empty($job->how_to_apply))
        <div>
          <h4>How to apply: {{$job->how_to_apply}}</h4>
        </div>
      @endif
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
@endsection

@push('footer_scripts')

@endpush