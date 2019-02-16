@extends('layouts.iframe')

@section('content')
    <div class="m-3">
        <div class="mb-2">
            <redirect-button
                    icon="md-add"
                    type="primary"
                    text="创建标签"
                    url="/tags/create">
            </redirect-button>
        </div>
        <tag-table></tag-table>
    </div>
@endsection