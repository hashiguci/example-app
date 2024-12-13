@extends('layouts.app')

@section('title', 'ダッシュボード')

@section('content')
    <h2 class="text-center mb-4">ダッシュボード</h2>
    <p class="text-center">ログイン中: {{ Auth::user()->name }}</p>
    <div class="d-flex justify-content-center">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary mx-2">トップページに戻る</a>
    </div>
    <form class="text-center mt-4" action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger mx-2">ログアウト</button>
    </form>
@endsection
