@extends('layouts.app')

@section('content')
<style type="text/css" media="screen">
    .card {
        height: 300px;
    }

    .book-img {
        height: 200px;
        text-align: center;
    }

    .book-img img {
        height: 180px;
        margin-top: 10px;
    }
</style>
<div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">回收站
                <a href="{{ url('books/restore-all') }}">还原全部</a>
                <a href="{{ url('books/clean-trashed') }}" class="text-danger"  onclick="return confirm('删除不可恢复，你真的打算彻底删除全部吗？')">清空回收站</a>
                <div class="pull-right text-right">
                    <a href="{{ URL::current() }}">全部</a>
                    @foreach($categories as $category)
                    <a href="{{ url('/?category='.$category->id) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="panel-body books">
                <div class="row">
                @if($books->isEmpty())
                <div class="col-md-12 text-center">空空如也~</div>
                @endif
                @foreach($books as $book)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="book-img">
                                <a href="{{ url('books/view/'.$book->id) }}" ><img class="img-responsive" src="{{ asset('covers/'.$book->cover) }}" alt=""></a>
                            </div>
                            <div class="card-block">
                                <a href="{{ url('books/view/'.$book->id) }}" ><h5 class="card-title">{{ $book->title }}</h5></a>

                                <a href="{{ url('books/force-delete/'.$book->id) }}" class="text-danger" onclick="return confirm('删除不可恢复，你真的打算彻底删除它吗？')">删除</a>
                                <a href="{{ url('books/restore/'.$book->id) }}" class="text-success">还原</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
</div>
@endsection
