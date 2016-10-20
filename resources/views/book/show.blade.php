@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">图书详情
                    <div class="pull-right">
                        <a href="{{ url('books/edit/'.$book->id) }}">编辑</a>
                        <a href="{{ url('books/delete/'.$book->id) }}" class="text-danger" onclick="return confirm('帅哥，你真的打算删除它吗？')">删除</a>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="book-image"><img class="img-responsive" src="{{ asset('covers/'.$book->cover) }}" /></div>
                        </div>
                        <div class="col-md-7">
                            <h3>{{ $book->title }}</h3>
                            <p>作者：{{ $book->author }}</p>
                            <p>分类：{{ $book->category->name }}</p>
                            <p>浏览次数：{{ $book->views_count }}</p>
                        </div>
                    </div>

                    <hr>
                    <h4>内容：</h4>
                    <div class="content">
                        {{ $book->content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
