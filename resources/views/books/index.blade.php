@extends('layouts.bbs')

@section('content')
    <h1>本棚</h1>
    <p><a href="/books/create">本を登録する</a></p>

    @foreach ($books as $book)
        <hr>
        <h2>{{ $book->title }}</h2>
        <p>{{ $book->comment }}</p>
        <p><a href="/books/{{ $book->id }}/edit">編集</a></p>
        <form action="/books/{{ $book->id }}" method="POST"
            onsubmit="return confirm('本当に削除しますか？');">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button>
        </form>
    @endforeach

    @if (count($books) === 0)
        <p>まだ本がありません。</p>
    @endif
@endsection
