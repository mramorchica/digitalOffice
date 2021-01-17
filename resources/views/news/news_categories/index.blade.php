@extends('layouts.admin-lte')

@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>News Categories</h1>
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>


 <!-- Main content -->
    <section>
      <div class="container-fluid">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>News Category Name</th>
                        <th>#</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @php $num = 1 @endphp
                    @foreach( $news_categories as $nc )
                        <tr>
                            <th>{{ $num++ }}</th>
                            <th>{{ $nc->category_name }}</th>
                            <th>
                                <a href="{{ route('news_categories.edit', $nc->id) }}">
                                    <input type="submit" value="EDIT" class="btn btn-warning">
                                </a>
                            </th>
                            <th>
                                <form action="{{ route('news_categories.destroy', $nc->id) }}" method="POST">
                                    @csrf 
                                    {{ method_field('DELETE') }}
            
                                    <input type="submit" value="DELETE" class="btn btn-danger">
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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