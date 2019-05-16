@extends('layouts.iframe')

@section('content')
    <div class="m-3">
        <div class="mb-2">
            <redirect-button
                    icon="md-add"
                    type="primary"
                    text="创建资源"
                    url="/documents/create">
            </redirect-button>
        </div>
        <document-table></document-table>
    </div>
@endsection