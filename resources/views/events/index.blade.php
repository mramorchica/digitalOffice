@extends('layouts.admin-lte')

@section('content')
	<section class="content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<h1>Events</h1>
				</div>
			</div>
		</div>
	</section>
	
	<!-- Main content -->
	<section>
		
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><a href="{{route('events.create')}}"><button class="btn btn-success">Create</button></a></h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="events" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>-</th>
						<th>Title</th>
						<th>Description</th>
						<th>Start</th>
						<th>End</th>
						<th>Public</th>
						<th>Link</th>
						<th>Draft</th>
						<th>Created By</th>
						<th>Created At</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					@forelse($events as $event)
						<tr>
							<td>
								<a href="{{route('events.show',$event->id)}}">
									<button class="btn btn-info">view</button>
								</a>
							</td>
							<td>{{$event->title}}</td>
							<td>{{$event->description}}</td>
							<td>{{$event->start}}</td>
							<td>{{$event->end}}</td>
							<td>{{(int)$event->isPublic > 0?'true':'false'}}</td>
							<td><a href="{{URL('meet/'.$event->link)}}">{{$event->link}}</a></td>
							<td>{{(int)$event->isDraft > 0?'true':'false'}}</td>
							<td>{{$event->creator->name}}</td>
							<td>{{$event->created_at}}</td>
							<td>
								<a href="{{ route('events.edit', ['event' => $event->id]) }}"><button class="btn btn-warning">Edit</button></a>
								<br/>
								<hr>
								<form action="{{ route('events.destroy',$event->id) }}" method="POST"
								      onsubmit="return ConfirmDelete()">
									{{ method_field('DELETE') }}
									@csrf
									<button type="submit" class="btn btn-danger delete-client-btn" value="delete">Delete</button>
								</form>
							</td>
						</tr>
					@empty
						<tr>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
						</tr>
					@endforelse
					</tbody>
					<tfoot>
					<tr>
						<th>-</th>
						<th>Title</th>
						<th>Description</th>
						<th>Start</th>
						<th>End</th>
						<th>Public</th>
						<th>Link</th>
						<th>Draft</th>
						<th>Created By</th>
						<th>Created At</th>
						<th>Action</th>
					</tr>
					</tfoot>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	
	</section>
	<!-- /.content -->
@endsection

@push('footer_scripts')
	<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/jszip/jszip.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
	<script type="text/javascript">
        $(function () {
            $("#events").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
	</script>
	<script>
        function ConfirmDelete(message) {
            if(!message || message.length < 1) {
                var x = confirm("Are you sure to delete this event?");
            }else{
                var x = confirm(""+message+"");
            }
            if (x)
                return true;
            else
                return false;
        }
	</script>
@endpush
