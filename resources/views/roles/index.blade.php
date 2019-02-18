@extends('layouts.iframe')

@section('content')
    <div class="m-3">
        <div class="mb-2">
            <redirect-button
                    icon="md-add"
                    type="primary"
                    text="创建角色"
                    url="/roles/create">
            </redirect-button>
        </div>
        <role-table></role-table>
    </div>
@endsection