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
@section('title', $article->title)

@section('content')
    <p><a href="{{ URL::previous() }}" class="btn btn-sm btn-default">Назад</a></p>
    <div class="mt-50">
        <p>{!! preg_replace($patterns, $replacements, $article->title) !!}</p>
        <p>{!! preg_replace($patterns, $replacements, $article->body) !!}</p>
    </div>
@endsection