@extends('layouts.app')

@section('title', 'トップページ')

@section('content')

    <h1>天気予報</h1>
    <h2>地点を選択</h2>
    <div class='points'>

        @foreach($places as $place)
            <a href="weather/{{ $place->api_id }}">{{ $place->name }}</a>
        @endforeach
    </div>


    <h2>郵便番号で都道府県を検索</h2>
    <form action="/search" method="GET" class="search-form">
        <input type="text" name="query" class="search-input" value="{{request('query')}}">
        <button type="submit" class="search-button">検索</button>
        @error('query')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </form>

@endsection
