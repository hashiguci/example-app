@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
    <h2 class="text-center mb-4">トップページ</h2>

    @auth
        <p class="text-center">ログイン中: {{ Auth::user()->name }}</p>
    @endauth

    <div class="d-flex justify-content-center">
        @auth
            <a href="{{ route('dashboard') }}" class="btn btn-primary mx-2">ダッシュボード</a>
        @else
            <a href="{{ route('register') }}" class="btn btn-outline-primary mx-2">ユーザー登録</a>
            <a href="{{ route('login') }}" class="btn btn-outline-primary mx-2">ログイン</a>
        @endauth
    </div>
@endsection
