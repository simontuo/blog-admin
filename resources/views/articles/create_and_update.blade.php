@extends('layouts.iframe')

@section('content')
    <div class="m-3">
        <article-create-and-update-form
            tags="{{ $tags->toJson() }}">
        </article-create-and-update-form>
    </div>
@endsection