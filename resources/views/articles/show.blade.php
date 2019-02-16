@extends('layouts.iframe')

@section('content')
    <div class="bread-crumb">
        <bread-crumb breadcrumbs="{{ collect($breadcrumbs)->toJson() }}"></bread-crumb>
    </div>
    <div class="row show-body">
        <div class="col-sm-12">
            {{--文章内容 开始--}}
            <div class="article-show">
                <div class="card">
                    <div class="card-body">
                        {{--文章标题 开始--}}
                        <div class="row">
                            <div class="col-sm-9">
                                <p class="card-title">{{ $article->title }}</p>
                            </div>
                            <div class="col-sm-3 text-right">
                                <div class="article-show-footer-icon">
                                    @foreach($article->tags as $tag)
                                        <span class="badge badge-secondary"
                                              style="background-color: {{ $tag->color }};">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card-title-sub">
                            <span>创建于 {{ $article->created_at }}</span> -
                            <span>阅读数 {{ $article->read_count }}</span> -
                            {{--<span>点赞数 {{ $article->likes->count() }}</span> ---}}
                            {{--<span>评论数 {{ $article->comments->count() }}</span>--}}
                        </div>
                        {{--文章标题 结束--}}
                        {{--文章内容 开始--}}
                        <div class="article-show-contnet markdown-body">
                            {!! $article->content !!}
                        </div>
                        {{--文章内容 结束--}}
                        {{--文章脚部 开始--}}
                        <div class="article-show-footer">

                            <div class="card-">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>原文作者：大力哥</strong> 该文章为搬运文章，若涉及侵权马上删除，原文链接
                                    <a href="#">请点击</a>.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{--文章脚部 结束--}}
                    </div>
                </div>
            </div>
            {{--文章内容 结束--}}
        </div>
    </div>
@endsection
