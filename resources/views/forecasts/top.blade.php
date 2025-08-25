@extends('layouts.app')

@section('title', 'トップページ')

@section('content')

    <h1>天気予報</h1>

    <div class='block-inner'>
        <h2>地点を選択</h2>
        <div class='text-center'>

            @foreach($places as $place)
                <x-button :place="$place" />
            @endforeach
        </div>
    </div>

    <div class='block-inner'>
        <h2>郵便番号で都道府県を検索</h2>
        <form action="/search" method="GET" class="search-form flex justify-center">
            <x-search :query="request('query')" />
        </form>
        @error('query')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

@endsection
