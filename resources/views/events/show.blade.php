@extends('layouts.admin-lte')

@section('content')
	<!-- Main content -->
	<section>
		<div class="card card-danger shadow-lg">
			<div class="card-header">
				<h3 class="card-title">{{$event->title}}</h3>
				
				<div class="card-tools">
					{{$event->start->diffForHumans()}}
					<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
					</button>
				</div>
				<!-- /.card-tools -->
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<p>{{$event->description}}</p>
				<a href="{{route('meet',$event->link)}}">
					<button class="btn btn-success"><i class="fa fa-phone" aria-hidden="true"></i>Join</button>
				</a>
			</div>
			<!-- /.card-body -->
		</div>
	</section>
@endsection

@push('footer_scripts')

@endpush

