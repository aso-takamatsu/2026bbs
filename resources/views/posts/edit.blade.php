<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿の編集</title>
</head>
<body>
    <h1>投稿の編集（No.{{ $post->id }}）</h1>

    <form action="/posts/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            タイトル：<br>
            <input type="text" name="title" value="{{ old('title', $post->title) }}">
            @error('title')<br><span style="color: red;">{{ $message }}</span>@enderror
        </p>
        <p>
            本文：<br>
            <textarea name="body" rows="5" cols="40">{{ old('body', $post->body) }}</textarea>
            @error('body')<br><span style="color: red;">{{ $message }}</span>@enderror
        </p>
        <button type="submit">更新する</button>
    </form>

    <p><a href="/posts">一覧に戻る</a></p>
</body>
</html>
