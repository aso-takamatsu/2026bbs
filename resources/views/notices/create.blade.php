<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お知らせの新規作成</title>
</head>
<body>
    <h1>お知らせの新規作成</h1>

    <form action="{{ url('/notices') }}" method="POST">
        @csrf
        <p>
            タイトル：<br>
            <input type="text" name="title" value="{{ old('title') }}">
            @error('title')
                <br><span style="color: red;">{{ $message }}</span>
            @enderror
        </p>
        <p>
            内容：<br>
            <textarea name="content" rows="5" cols="40">{{ old('content') }}</textarea>
            @error('content')
                <br><span style="color: red;">{{ $message }}</span>
            @enderror
        </p>
        <button type="submit">確認する</button>
    </form>

    <p><a href="{{ url('/notices') }}">お知らせ一覧に戻る</a></p>
</body>
</html>