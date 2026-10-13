<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $notice->title }}</title>
</head>
<body>
    <h1>{{ $notice->title }}</h1>
    <p>投稿者：{{ $notice->user->name }}</p>  
    <p>投稿日時：{{ $notice->created_at }}</p>
    <hr>
    <p>{{ $notice->content }}</p>
    <hr>
    @if (Auth::id() === $notice->user_id)                         
        <p><a href="/notices/{{ $notice->id }}/edit">このお知らせを編集する</a></p>
    @endif    
    <p><a href="/notices">一覧に戻る</a></p>
</body>
</html>