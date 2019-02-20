@extends('layouts.iframe')

@section('content')
    <div class="bread-crumb">
        <bread-crumb breadcrumbs="{{ collect($breadcrumbs)->toJson() }}"></bread-crumb>
    </div>
    <div class="show-body p-3">
        <role-create-and-update-form
                @if(\Route::currentRouteName() == 'roles.edit')
                    role="{{ $role->toJson() }}"
                @endif>
        </role-create-and-update-form>
    </div>
@endsection