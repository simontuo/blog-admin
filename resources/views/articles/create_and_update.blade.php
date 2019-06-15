@extends('layouts.iframe')

@section('content')
{{--    <div class="bread-crumb">--}}
{{--        <bread-crumb breadcrumbs="{{ collect($breadcrumbs)->toJson() }}"></bread-crumb>--}}
{{--    </div>--}}
    <div class="show-body p-3">
        <article-create-and-update-form
                @if(\Route::currentRouteName() == 'articles.edit')
                    article="{{ $article->toJson() }}"
                @endif
                tags="{{ $tags->toJson() }}">
        </article-create-and-update-form>
    </div>
@endsection
