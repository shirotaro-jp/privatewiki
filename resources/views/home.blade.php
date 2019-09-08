@extends('layouts.app')
@section('content')
@if (0 < count($articles))
        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <!-- ピックアップ -->
            <div class="row">
                @foreach ($articles as $article)
                <div class="col-lg-4">
                    <h2>{{ $article->title }}</h2>
                    <p><a class="btn btn-outline-primary" href="/article/{{ $article->id }}" role="button">View &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                @endforeach
            </div><!-- /.row -->

            <hr class="featurette-divider">

        </div><!-- /.container -->
@endif
@endsection