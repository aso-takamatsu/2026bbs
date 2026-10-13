@extends('layouts.bbs')

@section('content')
    <h1>本を登録する</h1>

    <form action="/books" method="POST">
        @csrf
        <p>
            書名：<br>
            <input type="text" name="title" value="{{ old('title') }}">         
            @error('title')                                                        
                <br><span style="color: red;">{{ $message }}</span>               
            @enderror                                                              
        </p>
        <p>
            ひとこと：<br>
            <textarea name="comment" rows="3" cols="40">{{ old('comment') }}</textarea>  
            @error('comment')                                                      
                <br><span style="color: red;">{{ $message }}</span>               
            @enderror                                                              
        </p>
        <button type="submit">登録する</button>
    </form>

    <p><a href="/books">一覧に戻る</a></p>
@endsection