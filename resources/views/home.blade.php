@extends('layouts.iframe')

@section('content')
    <div class="m-3">
        <div class="row">
            <div class="col-md-3">
                <count-card title="点击数量" color="rgb(119, 64, 234)" amount="{{ $data['clickAmount'] }}" icon="md-locate"></count-card>
            </div>
            <div class="col-md-3">
                <count-card title="用户数量" color="rgb(228, 76, 43)" amount="{{ $data['userAmount'] }}" icon="md-person-add"></count-card>
            </div>
            <div class="col-md-3">
                <count-card title="文章数量" color="rgb(25, 190, 107)" amount="{{ $data['articleAmount'] }}" icon="md-document"></count-card>
            </div>
            <div class="col-md-3">
                <count-card title="评论数量" color="rgb(94, 138, 186)" amount="{{ $data['commentAmount'] }}" icon="md-chatboxes"></count-card>
            </div>
        </div>
    </div>
@endsection
