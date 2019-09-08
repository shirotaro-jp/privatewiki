@extends('layouts.app')
@section('content')
@if (0 < count($articles))
        <div class="container marketing">

            <div class="row">
                @foreach ($articles as $article)
                    <p><a class="btn btn-light" href="/article/{{ $article->id }}" role="button">{{ $article->title }}</a></p>
                @endforeach
            </div><!-- /.row -->

            <hr class="featurette-divider">

        </div><!-- /.container -->
@endif
@endsection