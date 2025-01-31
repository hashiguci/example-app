@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
    <h2 class="text-center mb-4">トップページ</h2>
    @if (Auth::guard('admin')->check())
        <p class="text-center">管理者としてログイン中: {{ Auth::guard('admin')->user()->name }}</p>
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.index') }}" class="btn btn-primary mx-2">管理者ページ</a>
        </div>
    @elseif (Auth::check())
        <p class="text-center">ログイン中: {{ Auth::user()->name }}</p>
        <div class="d-flex justify-content-center">
            <a href="{{ route('dashboard') }}" class="btn btn-primary mx-2">ダッシュボード</a>
        </div>
    @else
        <div class="d-flex justify-content-center">
            <a href="{{ route('register') }}" class="btn btn-outline-primary mx-2">ユーザー登録</a>
            <a href="{{ route('login') }}" class="btn btn-outline-primary mx-2">ログイン</a>
        </div>
    @endif

    @if (Auth::guard('admin')->check() || Auth::check())
        <div class="d-flex justify-content-center">
            <a href="{{ route('profile') }}" class="btn btn-outline-primary mx-2">プロフィール</a>
        </div>
    @endif
@endsection
