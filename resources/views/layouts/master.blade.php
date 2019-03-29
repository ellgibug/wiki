<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .mt-50{
            margin-top: 50px;
        }
        .mb-50{
            margin-bottom: 50px;
        }
        .article{
            padding: 20px 0;
            border-bottom: 1px solid #ccc;
        }
        .mt-20{
           margin-top: 20px;
        }
        .mb-20{
            margin-bottom: 20px;
        }
        b{
            font-weight: 700;
        }
        *{
            font-family: 'Times New Roman', serif;
        }
        p, textarea, input[type=text]{
            font-size: 18px !important;
        }
    </style>
</head>
<body>
<div class="container mt-50 mb-50">
    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
