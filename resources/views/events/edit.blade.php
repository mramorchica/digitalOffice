@extends('layouts.admin-lte')

@section('content')
	<!-- Main content -->
	<section>
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-10">
					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title">Edit Event</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form method="post" action={{ route('events.update',$event->id)}} class="form-horizontal" id="edit-event">
							@csrf
							@method('PUT')
							<div class="card-body">
								<div class="form-group row">
									<label for="category-name" class="col-sm-2 col-form-label">Title</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="title" placeholder="Title"
										       name="title" value="{{$event->title}}">
									</div>
								</div>
								<div class="form-group row">
									<label for="description" class="col-sm-2 col-form-label">Description</label>
									<div class="col-sm-10">
										<textarea name="description" id="description" cols="60" rows="5"
										          form="edit-event">{{$event->description}}</textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="start" class="col-sm-2 col-form-label">Start</label>
									<div class="col-sm-10">
										<input type="datetime-local" class="form-control" id="start"
										       placeholder="start datetime" name="start" value="{{!is_null($event->start)?$event->start->format('Y-m-d\TH:i'):''}}">
									</div>
								</div>
								<div class="form-group row">
									<label for="end" class="col-sm-2 col-form-label">End</label>
									<div class="col-sm-10">
										<input type="datetime-local" class="form-control" id="end" placeholder="end date time"
										       name="end" value="{{!is_null($event->end)?$event->end->format('Y-m-d\TH:i'):''}}">
									</div>
								</div>
								<div class="form-group row">
									<label for="end" class="col-sm-2 col-form-label">Public</label>
									<div class="col-sm-10">
										<label for="public1">yes</label>
										<input type="radio" id="public1" name="isPublic" value="1"
										       {{(int)$event->isPublic > 0?'checked':''}}>
										<label for="pubic2">no</label>
										<input type="radio" id="public2" name="isPublic" value="0" {{(int)$event->isPublic < 1?'checked':''}}>
									</div>
								</div>
								<div class="form-group row">
									<label for="publish" class="col-sm-2 col-form-label">Publish</label>
									<div class="col-sm-10">
										<label for="y1">yes</label>
										<input type="radio" id="y1" name="isDraft" value="0" {{(int)$event->isDraft > 0?'checked':''}}>
										<label for="n1">no</label>
										<input type="radio" id="n1" name="isDraft" value="1" {{(int)$event->isDraft < 1?'':'checked'}}>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-info float-right">Save</button>
							</div>
							<!-- /.card-footer -->
						</form>
					</div>
				</div>
				<!--/.col (left) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->

@endsection

@push('footer_scripts')

@endpush
