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
            <div class="panel-heading">书本列表
                <a href="{{ url('books/trashed') }}">回收站</a>
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
                <div class="col-md-12 text-center">空空如也~ <a href="{{ url('books/new') }}">添加图书</a></div>
                @endif
                @foreach($books as $book)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="book-img">
                                <a href="{{ url('books/view/'.$book->id) }}" ><img class="img-responsive" src="{{ asset('covers/'.$book->cover) }}" alt=""></a>
                            </div>
                            <div class="card-block">
                                <a href="{{ url('books/view/'.$book->id) }}" ><h5 class="card-title">{{ $book->title }}</h5></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
</div>
@endsection
