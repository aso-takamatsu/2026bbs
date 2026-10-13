<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>送信内容の確認</title>
</head>
<body>
    <h1>送信内容の確認</h1>

    <p>タイトル：{{ $title }}</p>
    <p>投稿者：{{ $author }}</p>
    <p>内容：{{ $content }}</p>

    <hr>
    <p><a href="{{ url('/notices/create') }}">フォームに戻る</a></p>
    <p><a href="{{ url('/notices') }}">お知らせ一覧に戻る</a></p>
</body>
</html>