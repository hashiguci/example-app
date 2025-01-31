<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');  // ログインしていないユーザーのみがアクセス可能
    }

    /**
     * ログインフォームを表示する
     *
     * @return View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * ユーザーのログイン処理を実行する
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. リクエストのデータを検証する
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. 管理者ユーザとして認証を試みる
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            // 認証成功: 管理者ページにリダイレクト
            $request->session()->regenerate();
            return redirect()->intended(route('admin.index'));
        }

        // 3. 一般ユーザとして認証を試みる
        if (AUth::attempt($credentials, $request->filled('remember'))) {
            //認証成功: 一般ダッシュボードにリダイレクト
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // 認証に失敗した場合
        return back()->withErrors([
            'email' => 'ログイン情報が正しくありません。',
        ])->onlyInput('email');
    }
}
