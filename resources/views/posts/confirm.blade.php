<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>送信内容の確認</title>
</head>
<body>
    <h1>送信内容の確認</h1>

    <p>タイトル：{{ $title }}</p>
    <p>本文：{{ $body }}</p>
    <p>投稿者名：{{ $author }}</p>

    <hr>
    <p><a href="/posts/create">フォームに戻る</a></p>

    <hr>
    <p>ミニ掲示板　第2回課題　麻生 太郎</p>
</body>
</html>