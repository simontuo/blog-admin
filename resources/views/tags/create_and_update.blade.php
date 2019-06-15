@extends('layouts.iframe')

@section('content')
{{--    <div class="bread-crumb">--}}
{{--        <bread-crumb breadcrumbs="{{ collect($breadcrumbs)->toJson() }}"></bread-crumb>--}}
{{--    </div>--}}
    <div class="show-body p-3">
        <tag-create-and-update-form
            @if(\Route::currentRouteName() == 'tags.edit')
                tag="{{ $tag->toJson() }}"
            @endif>
        </tag-create-and-update-form>
    </div>
@endsection
