@extends('layouts.app')

@section('title', $city . 'の天気')

@section('content')

    <h1>{{$city}}の天気</h1>
    <h2>{{$date}}</h2>
    <div class='weather'>{{$weather}}</div>
    @if ($temperature != null)
        <div class='temperature'>
            <h3>最高気温</h3>
            <p>{{$temperature}}度</p>
        </div>
    @endif
    <div class='about'>{!!$about!!}</div>

    <div>
        <a href='change/{{ $id }}'>
            @if ($display == 1)
                トップページから非表示にする
            @else
                トップページに表示する
            @endif
        </a>
    </div>

    <a href='/top' class='back'>back</a>

@endsection
