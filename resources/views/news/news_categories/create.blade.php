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
                <h3 class="card-title">Add News Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form method="post" action={{ route('news_categories.store')}} class="form-horizontal">
              @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="category-name" class="col-sm-2 col-form-label">News Category Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="category-name" placeholder="Category name" name="category_name" value="{{ old('category_name')}}">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <a href="{{ url('news_categories') }}" class="btn btn-default">Cancel</a>
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
<script type="text/javascript">
  console.log('test footer scripts!')
</script>
@endpush

