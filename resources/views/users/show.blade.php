@extends('layouts.iframe')

@section('content')
    <div class="m-3 row">
        <div class="col-md-4">
            <user-info-card user="{{ user()->toJson() }}"></user-info-card>
        </div>
        <div class="col-md-8">
            <user-tab></user-tab>
        </div>
    </div>
@endsection