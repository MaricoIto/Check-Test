<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
    // ユーザー登録
    public function store(UserRequest $request)
    {
        Log::info('Request data:', $request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    //　ログイン
    public function login(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // ログイン成功
            return redirect()->route('admin');
        } else {
            // ログイン失敗
            return redirect()->route('login')
                ->withErrors(['email' => '認証に失敗しました。'])
                ->withInput();
        }
    }

    // ログアウト
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
