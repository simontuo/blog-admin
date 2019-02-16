@extends('layouts.iframe')

@section('content')
    <div class="m-3">
        <article-create-and-update-form
                @if(\Route::currentRouteName() == 'articles.edit')
                    article="{{ $article->toJson() }}"
                @endif
            tags="{{ $tags->toJson() }}">
        </article-create-and-update-form>
    </div>
@endsection