@extends('errors::illustrated-layout')

@section('code', '403')
@section('title', __('403 Forbidden'))

@section('image')
    <div style="background-image: url({{ asset('/svg/404.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __('对不起，你有没有权限访问该资源'))