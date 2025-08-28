@extends('layouts.app')

@section('title', '各地の天気')

@section('icon')
    <link rel="shortcut icon" href="img/sunny.svg">
@endsection

@section('content')

    <x-weatherTop :weathers="$weathers" />
    <h1 class='italic'>各　地　の　天　気</h1>

    <div class='block-inner'>
        <h2>地点を選択</h2>
        <div class='text-center'>
            @foreach($places as $place)
                <x-button :place="$place" />
            @endforeach
        </div>
    </div>

    <div class='block-inner'>
        <h3>都道府県名から場所を検索</h3>
        <form action="/searchName" method="GET" class="search-form flex justify-center">
            <x-searchName :name="request('name')" />
        </form>
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div class='block-inner'>
        <h3>郵便番号で都道府県を検索</h3>
        <form action="/search" method="GET" class="search-form flex justify-center">
            <x-search :query="request('query')" />
        </form>
        @error('query')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

@endsection
