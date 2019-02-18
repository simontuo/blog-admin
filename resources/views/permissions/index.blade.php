@extends('layouts.iframe')

@section('content')
    <div class="m-3">
        <div class="mb-2">
            <redirect-button
                    icon="md-add"
                    type="primary"
                    text="创建权限"
                    url="/permissions/create">
            </redirect-button>
        </div>
        <permission-table></permission-table>
    </div>
@endsection