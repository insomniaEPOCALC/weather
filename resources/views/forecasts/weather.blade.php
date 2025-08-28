@extends('layouts.app')

@section('title', $city . 'の天気')

@section('icon')
    <link rel="shortcut icon" href={{$icon}}>
@endsection

@section('content')
    <div class='block-inner'>
        <h1>{{$city}}の天気</h1>
        <h2>{{$date}}</h2>
        <p><img src="{{ $icon }}"></p>
    </div>
    <div class='weather'>{{$weather}}</div>
    @if ($temperature != null)
        <div class='temperature'>
            <h3>最高気温</h3>
            <p>{{$temperature}}度</p>
        </div>
        <div class='tomorrow'>
            <h2>{{ $dateNext }}の天気</h2>
            <p><img src="{{ $iconNext }}"></p>
            <p>{{ $temperatureMaxNext }}℃ / {{ $temperatureMinNext }}℃</p>
        </div>
    @endif

    <div class="display">
        <a href='change/{{ $id }}'>
            @if ($display == 1)
                この場所をトップページに表示しない
            @else
                この場所をトップページに表示する
            @endif
        </a>
    </div>


    <div class='box'>
        <div class='about'>{!!$about!!}</div>
    </div>

    <h2>AIからのアドバイス</h2>
    <div class='box'>
        <div class='about'>{!!$comment!!}</div>
    </div>

    <a href='/top' class='back'>戻る</a>

@endsection
