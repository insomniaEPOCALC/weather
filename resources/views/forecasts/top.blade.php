@extends('layouts.app')

@section('title', 'トップページ')

@section('content')

    <h1 class="text-6xl text-center">天気予報</h1>

    <div class='block-inner'>
        <h2 class="text-center">地点を選択</h2>
        <div class='text-center'>

            @foreach($places as $place)
                <x-button :place="$place" />
            @endforeach
        </div>
    </div>


    <div class='block-inner'>
        <h2 class='text-center'>郵便番号で都道府県を検索</h2>
        <form action="/search" method="GET" class="search-form flex justify-center">
            <input type="text" name="query" class="search-input" value="{{request('query')}}">
            <button type="submit" class="search-button">検索</button>
            @error('query')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </form>
    </div>
@endsection
