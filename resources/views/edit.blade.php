@extends('layouts.master')
@section('title', 'Изменить статью '. $article->title)

@section('content')
    <p><a href="{{ URL::previous() }}" class="btn btn-sm btn-default">Назад</a></p>
    <div class="jumbotron">
        <h1 class="display-4">Изменить статью</h1>
    </div>
    @include('errors.errors')
    <div class="mt-50">
        <form method="post" action="{{ route('articles.update', $article->id) }}">
            {{ csrf_field() }}
            {{ method_field('patch') }}
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Название" value="{{ $article->title }}">
            </div>
            <div class="form-group">
                <textarea name="body" class="form-control" rows="10" placeholder="Содержимое">{{ $article->body }}</textarea>
            </div>
            <button type="submit" class="btn btn-sm btn-success">Сохранить</button>
        </form>
    </div>
@endsection