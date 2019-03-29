@extends('layouts.master')
@section('title', 'Новая статья')

@section('content')
    <p><a href="{{ route('articles.index') }}" class="btn btn-sm btn-default">Главная страница</a></p>
    <div class="jumbotron">
        <h1 class="display-4">Новая статья</h1>
    </div>
    @include('errors.errors')
    <div class="mt-50">
        <form method="post" action="{{ route('articles.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Название" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <textarea name="body" class="form-control" rows="10" placeholder="Содержимое">{{ old('body') }}</textarea>
            </div>
            <button type="submit" class="btn btn-sm btn-success">Сохранить</button>
        </form>
    </div>
@endsection