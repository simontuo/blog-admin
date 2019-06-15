@extends('layouts.iframe')

@section('content')
{{--    <div class="bread-crumb">--}}
{{--        <bread-crumb breadcrumbs="{{ collect($breadcrumbs)->toJson() }}"></bread-crumb>--}}
{{--    </div>--}}
    <div class="show-body p-3">
        <permission-create-and-update-form
                @if(\Route::currentRouteName() == 'permissions.edit')
                    permission="{{ $permission->toJson() }}"
                @endif
                http_methods="{{ collect($httpMethods)->toJson() }}">
        </permission-create-and-update-form>
    </div>
@endsection
