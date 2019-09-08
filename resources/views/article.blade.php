@extends('layouts.app')
@section('content')

        <div class="container marketing">

            <!-- START THE FEATURETTES -->
            <!-- 記事 -->

            <div class="row featurette">
                <div class="w-100">
                    <h1 class="featurette-heading">{{ $article->title }}</h1>
                    <h3 class="info-icon"><i class="fas fa-info-circle"></i></h3>
                    <!--<p class="lead">{{ $article->content }}</p>-->
                    {!! $article->content !!}
                </div>
            </div>
            <p><a class="btn btn-outline-primary" href="/edit/{{ $article->id }}" role="button">Edit &raquo;</a></p>
            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->

@endsection