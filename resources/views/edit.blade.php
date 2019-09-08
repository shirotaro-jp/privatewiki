@extends('layouts.app')
@section('content')

        <div class="container marketing">

            <!-- START THE FEATURETTES -->
            <!-- 記事 -->

            <div class="row featurette">
                <!-- バリデーションエラーの表示に使用するエラーファイル-->
                @include('common.errors')
                <form action="{{ url('rewrite') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <p>Title</p>
                        <input type="text" name="title" id="title" class="form-control featurette-heading" value="{{ $article->title }}">
                        <p>Content</p>
                        <textarea type="text" name="content" id="content" class="form-control lead" rows="30" cols="120">{{ $article->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-outline-primary">Save &raquo;</button>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{$article->id}}" />
                </form>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->

@endsection