@extends('layouts.app')

@section('title', 'プロフィール')

@section('content')
    <h2 class="text-center mb-4">プロフィール</h2>
    @if (Auth::guard('admin')->check() || Auth::check())
        <p class="text-center">ユーザ名: {{ Auth::guard('admin')->user()->name ?? Auth::user()->name }}</p>
        <p class="text-center">メールアドレス: {{ Auth::guard('admin')->user()->email ?? Auth::user()->email }}</p>
    @endif
@endsection
