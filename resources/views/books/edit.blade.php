@extends('layouts.bbs')

@section('content')
    <h1>本の編集</h1>

    <form action="{{ url('/books/' . $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>
            書名：<br>
            <input type="text" name="title" value="{{ old('title', $book->title) }}">        
            @error('title')                                                                   
                <br><span style="color: red;">{{ $message }}</span>                          
            @enderror                                                                         
        </p>
        <p>
            ひとこと：<br>
            <textarea name="comment" rows="3" cols="40">{{ old('comment', $book->comment) }}</textarea>  
            @error('comment')                                                                 
                <br><span style="color: red;">{{ $message }}</span>                          
            @enderror                                                                         
        </p>
        <button type="submit">更新する</button>
    </form>

    <p><a href="{{ url('/books') }}">一覧に戻る</a></p>
@endsection