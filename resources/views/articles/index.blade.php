@extends('layouts.iframe')

@section('content')
    <div class="m-3">
        <div class="mb-2">
            <redirect-button
                    icon="md-add"
                    type="primary"
                    text="创建文章"
                    url="/articles/create">
            </redirect-button>
        </div>
        <article-table></article-table>
    </div>
@endsection