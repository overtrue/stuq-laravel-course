@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">编辑图书</div>

                <div class="panel-body">
                    <form action="{{ url('books/update/'.$book->id) }}" method="post" enctype="multipart/form-data">
                        <fieldset class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">书名</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="请输入书名" value="{{$book->title}}">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </fieldset>
                        <fieldset class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                            <label for="author">作者</label>
                            <input type="text" class="form-control" name="author" id="author"  value="{{$book->author}}">
                            @if ($errors->has('author'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('author') }}</strong>
                                </span>
                            @endif
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="category_id">分类</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($book->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </fieldset>
                        <fieldset class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
                            <label for="cover">封面</label>
                            <img src="{{ asset('covers/'.$book->cover) }}" class="img-responsive" alt="">
                            <input type="file" name="cover" value="" placeholder="">
                            @if ($errors->has('cover'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cover') }}</strong>
                                </span>
                            @endif
                        </fieldset>
                        <fieldset class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content">内容</label>
                            <textarea name="content" class="form-control" rows="10">{{ $book->content }}</textarea>
                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </fieldset>
                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">提交</button>
                        </fieldset>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
