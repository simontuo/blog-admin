@extends('layouts.iframe')

@section('content')
    <div class="m-3">
        <div class="mb-2">
            <create-manager-button></create-manager-button>
        </div>
        <user-table></user-table>
    </div>
@endsection