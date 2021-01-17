@extends('layouts.admin-lte')

@section('content')
	<!-- Main content -->
	<section class="row">
		@foreach ($jobs as $job)
			<div class="col-md-3">
				<div class="card card-primary collapsed-card">
					<div class="card-header">
						<h3 class="card-title">{{$job->title}}</h3>
						
						<div class="card-tools">
							Expires: {{$job->end_date}}
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i
										class="fas fa-plus"></i>
							</button>
						</div>
						<!-- /.card-tools -->
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						{!! $job->description !!}
						<a href='{{url("/jobs/$job->id")}}'>
							<button class="btn btn-success">View Details</button>
						</a>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		@endforeach
	</section>
@endsection

@push('footer_scripts')

@endpush