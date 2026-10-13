<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お知らせの編集</title>
</head>
<body>
    <h1>お知らせの編集</h1>

    <form action="/notices/{{ $notice->id }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            タイトル：<br>
            <input type="text" name="title" value="{{ old('title', $notice->title) }}">
            @error('title')<br><span style="color: red;">{{ $message }}</span>@enderror
        </p>
        <p>
            内容：<br>
            <textarea name="content" rows="5" cols="40">{{ old('content', $notice->content) }}</textarea>
            @error('content')<br><span style="color: red;">{{ $message }}</span>@enderror
        </p>
        <button type="submit">更新する</button>
    </form>

    <p><a href="/notices">一覧に戻る</a></p>
</body>
</html>