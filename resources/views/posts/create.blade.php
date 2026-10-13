<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規投稿</title>
</head>
<body>
    <h1>新規投稿</h1>
    {{-- @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action="/posts" method="POST">
        @csrf
        <p>
            タイトル：<br>
            <input type="text" name="title" value="{{ old('title') }}">
            @error('title')
                <br><span style="color: red;">{{ $message }}</span>
            @enderror
        </p>
        <p>
            本文：<br>
            <textarea name="body" rows="5" cols="40">{{ old('body') }}</textarea>
            @error('body')
                <br><span style="color: red;">{{ $message }}</span>
            @enderror
        </p>
        {{-- <p>
            投稿者名：<br>
            <input type="text" name="author">
        </p> --}}
        <button type="submit">投稿する</button>
    </form>

    <p><a href="/posts">一覧に戻る</a></p>
</body>
</html>
