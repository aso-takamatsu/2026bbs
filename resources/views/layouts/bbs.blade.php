<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ミニ掲示板</title>
</head>
<body>
    <p><a href="{{ url('/posts') }}">掲示板</a> ｜ <a href="{{ url('/notices') }}">お知らせ</a>｜ <a href="{{ url('/books') }}">本棚</a></p>
    @yield('content')
</body>
</html>
