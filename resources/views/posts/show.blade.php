@extends('layouts.bbs')

@section('content')

    <h1>{{ $post->title }}</h1>
    <p>投稿者：{{ $post->user->name }}</p>
    <p>投稿日時：{{ $post->created_at }}</p>
    <hr>
    <p>{{ $post->body }}</p>
    <hr>
    <p><a href="/posts/{{ $post->id }}/edit">この投稿を編集する</a></p>
    <p><a href="/posts">一覧に戻る</a></p>
@endsection
