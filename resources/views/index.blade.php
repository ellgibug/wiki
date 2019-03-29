@php
    $patterns = array();
    $patterns[0] = '#\*{2}(.*?)\*{2}#'; // bold
    $patterns[1] = '#_{2}(.*?)_{2}#'; // underline
    //$patterns[2] = '#\({2}(.*?)\|{1}#'; // text
    //$patterns[3] = '#\|{1}(.*?)\){2}#'; // url

    $replacements = array();
    $replacements[1] = '<b>$1</b>'; // bold
    $replacements[0] = '<u>$1</u>'; // underline

    // мои попытки вывести ссылку.
    // Думала разбить ее на 2 части (( ... | - первая часть и
    // | ... )) - вторая часть.
    // Или найти сначала (( ... )), а потом оттуда выбрать первую часть до | и вторую часть после |,
    // но тоже не получилось, чтоб работало.

    //$replacements[1] = '<a href="$1">'; // (( ... | - первая часть
    //$replacements[0] = '$1</a>'; // | ... )) - вторая часть
    //$replacements[0] = '<a href="$1">$1</a>'; // тут думала, что можно как-то вставить и заменить результат, найденный на 6 и 5 строках кода соответсвенно
@endphp

@extends('layouts.master')
@section('title', 'Статьи')

@section('content')
    @if(Session::has('message'))
    <div class="alert alert-success mb-50">
        <p>{{ Session::get('message') }}</p>
    </div>
    @endif
    <div class="jumbotron">
        <h1 class="display-4">WIKI</h1>
    </div>
    <p><a href="{{ route('articles.create') }}" class="btn btn-sm btn-success">Создать статью</a></p>
    <div class="mt-50">
        @forelse($articles as $article)
            <div class="row article">
                <div class="col-lg-10">
                    <p>{!! preg_replace($patterns, $replacements, $article->title) !!}</p>
                    <p>{!! preg_replace('#\*{2}(.*?)\*{2}#', '<b>$1</b>', $article->body) !!}</p>
                </div>
                <div class="col-lg-2">
                    <div class="mt-50">
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-sm btn-success btn-block">Показать статью</a>
                    </div>
                    <div class="mt-20 mb-20">
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-success btn-block">Изменить статью</a>
                    </div>
                    <div class="mt-20 mb-20">
                        <form method="post" action="{{ route('articles.destroy', $article->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="button" class="btn btn-sm btn-success btn-block"
                                    onclick='
                                                if (confirm("Вы точно хотите удалить статью?")) {
                                                    $(this).closest("form").submit();
                                                }
                                          '>Удалить статью</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>К сожалению, статей нет.</p>
        @endforelse
        {{ $articles->links() }}
    </div>
@endsection