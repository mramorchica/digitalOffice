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
            <h3 class="card-title">Add News</h3>
          </div>
          <!-- /.card-header -->

          <!-- form start -->
          <form method="post" action={{ route('news.store')}} class="form-horizontal" role="form" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label for="news-title" class="col-sm-2 col-form-label">News Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="news-title" placeholder="News Title" name="news_title" value="{{ old('news_title')}}">
                </div>
              </div>
              <div class="form-group row">
                <label for="news-title" class="col-sm-2 col-form-label">News Content</label>
                <div class="col-sm-10">
                  <textarea id="news-content" value="{{ old('news_content')}}" cols="50" name="content"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="public-news" class="col-sm-2 col-form-label">Public News</label>
                <div class="col-sm-1">
                  <input type="radio" id="public-news" name="is_public" value="1">
                </div>
                <label for="public-news" class="col-sm-2 col-form-label">Private News</label>
                <div class="col-sm-1">
                  <input type="radio" id="public-news" name="is_public" value="0">
                </div>
              </div>
              <div class="form-group row">
                <label for="date-published" class="col-sm-2 col-form-label">News Category</label>
                <div class="col-sm-10">
                  <select class="form-control" id="date-published" name="news_category">
                    @foreach( $categories as $nc )

                    <option value="{{ $nc->id }}">{{ $nc->category_name }}</option>
                    @endforeach

                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="date-published" class="col-sm-2 col-form-label">Date Published</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="date-published" placeholder="end date time" name="date_published">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                      <label class="custom-file-label" for="exampleInputFile">Featured Image</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="{{ url('news') }}" class="btn btn-default">Cancel</a>
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