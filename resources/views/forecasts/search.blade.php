@extends('layouts.app')

@section('title','検索結果')

@section('content')

<h1>{{ $prefecture }}の地域一覧</h1>
<h2>以下から選択してください</h2>
<div class='points'>

    @foreach($places as $place)
    <a href="weather/{{ $place->api_id }}">{{ $place->name }}</a>
    @endforeach
</div>

<a href='/top' class='back'>back</a>

@endsection
