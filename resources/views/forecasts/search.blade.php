@extends('layouts.app')

@section('title', '検索結果')

@section('content')
@if(!isset($places->name))
    <h1>{{ $prefecture }}の地域一覧</h1>
    <h2>以下から選択してください</h2>
    <div class='block-inner'>
        <div class='text-center'>
            @foreach($places as $place)
                <x-button :place="$place" />
            @endforeach
        </div>
    </div>
@else
        <div class='block-inner'>
        <h1>国際宇宙ステーションの現在地</h1>
        <h2>緯度:{{ $longitude }}</h2>
        <h2>経度:{{ $latitude }}</h2>
    </div>
    <div class='block-inner'>
        <p>存在しない郵便番号です</p>
    </div>

@endif

    <a href='/top' class='back'>戻る</a>
@endsection
