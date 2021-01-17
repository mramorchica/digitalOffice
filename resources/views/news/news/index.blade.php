@extends('layouts.admin-lte')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>News List</h1>
            </div>
        </div>
        <a href="{{url('/news/create')}}" class="btn btn-success"> Add News</a>
    </div><!-- /.container-fluid -->
</section>
<div class="col-12">
    <div class="card card-primary">

        <div class="card-header">
            <h4 class="card-title">Latest News</h4>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach( $news as $n )



                <div class="col-sm-2">

                    <a href="{{ route('news.show', $n->id ) }}" data-toggle="lightbox" data-title="{{ $n->title }}" data-gallery="gallery">
                        <img src="{{ asset('images/news_images/' . $n->image) }}" class="img-fluid mb-2" alt="white sample" />
                    </a>
                    <div class="col-xs-12 text-center">
                        <h4 class="text-center">
                            {{ $n->title }}
                        </h4>
                    </div>
                    <div class="col-xs-6 text-center">
                        <p>
                            {{$n->date_published}}
                        </p>
                    </div>
                    <div class="col-xs-6 text-center">
                        <p>
                            author: {{$n->author->name}}
                        </p>
                    </div>
                    <div class="col-xs-6 text-center">
                        <a href="{{url('/news/' . $n->id)}}" class="btn btn-success"> Read More</a>
                    </div>
                    <div class="row float-right">
                        <a href="{{ route('news.edit', $n->id) }}" class="btn btn-warning">
                           E
                        </a>
                        <form action="{{ route('news.destroy', $n->id) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}

                            <input type="submit" value="D" class="btn btn-danger">
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer_scripts')
<script type="text/javascript">
    console.log('test footer scripts!')
</script>
@endpush