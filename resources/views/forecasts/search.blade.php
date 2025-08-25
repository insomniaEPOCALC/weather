@extends('layouts.app')

@section('title', '検索結果')

@section('content')

    <h1>{{ $prefecture }}の地域一覧</h1>
    <h2>以下から選択してください</h2>
    <div class='block-inner'>
        <div class='text-center'>
            @foreach($places as $place)
                <x-button :place="$place" />
            @endforeach
        </div>
    </div>

    <a href='/top' class='back'>戻る</a>
@endsection
