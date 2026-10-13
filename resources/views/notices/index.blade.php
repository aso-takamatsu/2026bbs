<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お知らせ一覧</title>
</head>
<body>
    <h1>お知らせ一覧</h1>

    @auth
        <p>{{ Auth::user()->name }}（ID:{{ Auth::user()->id }}）さんでログイン中
            <form action="/logout" method="POST" style="display:inline;">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
        </p>
        <p><a href="/notices/create">新規作成</a></p>
    @endauth

    @guest
        <p><a href="/login">ログイン</a> / <a href="/register">新規登録</a></p>
        <p>お知らせを登録するにはログインしてください。</p>
    @endguest

    <p>
        <a href="/posts">掲示板</a> ｜
        <a href="/notices">お知らせ</a>
    </p>

    @if (session('message'))
        <p style="color: green;">{{ session('message') }}</p>
    @endif

    <p>全{{ count($notices) }}件</p>

    @foreach ($notices as $notice)
        <hr>
        <h2><a href="/notices/{{ $notice->id }}">{{ $notice->title }}</a></h2>
        <p>投稿者：{{ $notice->user->name }}</p>
        <p>{{ $notice->created_at }}</p>

        @if (Auth::id() === $notice->user_id)                    
            <p><a href="/notices/{{ $notice->id }}/edit">編集</a></p>

            <form action="/notices/{{ $notice->id }}" method="POST"
                  onsubmit="return confirm('本当に削除しますか？');">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
        @endif         
    @endforeach
</body>
</html>