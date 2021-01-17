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
                        <h3 class="card-title">{{ $news->title }}</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <div class="jumbotron">
                        <img src="{{ asset('images/news_images/' . $news->image) }}" class="img-fluid mb-2" alt="white sample" />
                        <p>{{ $news->content }}</p>
                        <p>
                            published: <b>{{ $news->date_published }}</b>
                            -
                            author: <b>{{ $news->author->name }}</b>
                        </p>
                        <p>
                            <a href="{{ route('news.edit', $news->id) }}" class="btn btn-default">
                                Back
                            </a>
                            <a href="{{ route('news.edit', $news->id) }}" class="btn btn-warning float-right">
                                Edit The news
                            </a>
                        </p>
                    </div>
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