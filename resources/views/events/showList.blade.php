@extends('layouts.admin-lte')

@section('content')
	<!-- Main content -->
	<section>
		@foreach ($events as $event)
			<div class="col-md-3">
				<div class="card card-primary collapsed-card">
					<div class="card-header">
						<h3 class="card-title">{{$event->title}}</h3>
						
						<div class="card-tools">
							{{$event->start->diffForHumans()}}
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i
										class="fas fa-plus"></i>
							</button>
						</div>
						<!-- /.card-tools -->
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						{{$event->description}}
						<a href="{{route('meet',$event->link)}}">
							<button class="btn btn-success"><i class="fa fa-phone" aria-hidden="true"></i>Join</button>
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
