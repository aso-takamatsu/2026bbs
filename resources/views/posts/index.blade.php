@extends('layouts.bbs')

@section('content')

    <h1>ミニ掲示板</h1>

    @if (session('message'))
        <p style="color: green;">{{ session('message') }}</p>
    @endif
    @auth
        <p>{{ Auth::user()->name }} さんでログイン中
            <form action="/logout" method="POST" style="display:inline;">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
        </p>
        <p><a href="/posts/create">新規投稿する</a></p>
    @endauth

    @guest
        <p><a href="/login">ログイン</a> / <a href="/register">新規登録</a></p>
        <p>投稿するにはログインしてください。</p>
    @endguest

    

    <p>投稿数：{{ count($posts) }}件</p>

    @foreach ($posts as $post)
        <hr>
        <h2>No.{{ $post->id }}
        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
        <p>投稿者：{{ $post->user->name }}</p>
        <p>{{ $post->body }}</p>
        <p>{{ $post->created_at }}</p>
        @if (Auth::id() === $post->user_id)
            <a href="/posts/{{ $post->id }}/edit">編集</a>
            <form action="/posts/{{ $post->id }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">削除</button>
            </form>
        @endif


    @endforeach

    @if (count($posts) === 0)
        <p>まだ投稿がありません。</p>
    @endif

    <hr>
    <p>ミニ掲示板　第1回課題　麻生 太郎</p>
@endsection
