@extends('layouts.iframe')

@section('content')
{{--    <div class="bread-crumb">--}}
{{--        <bread-crumb breadcrumbs="{{ collect($breadcrumbs)->toJson() }}"></bread-crumb>--}}
{{--    </div>--}}
    <div class="show-body p-3">
        <document-create-and-update-form
                @if(\Route::currentRouteName() == 'documents.edit')
                document="{{ $document->toJson() }}"
                @endif
                tags="{{ $tags->toJson() }}">
        </document-create-and-update-form>
    </div>
@endsection
