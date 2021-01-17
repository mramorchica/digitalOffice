@extends('layouts.admin-lte')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>New Messages</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section>
    <div class="container-fluid">
        <div class="col-md-8">
            @if( $new_messages )
            <table class="table table-striped">
                <tbody>
                    @php $num = 1 @endphp
                    @foreach( $new_messages as $nm )
                    <tr>
                        <th>{{ $num++ }}</th>
                        <th>{{ $nm->message }}</th>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>No new Messages</p>
            @endif
            <a href="{{ url('/news') }}" class="btn btn-default">Home</a>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@push('footer_scripts')
<script type="text/javascript">
    console.log('test footer scripts!')
</script>
@endpush