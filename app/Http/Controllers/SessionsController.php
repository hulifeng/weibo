<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $confirm = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($confirm, $request->has('remember'))) {
            // 登录成功操作
            session()->flash('success', '欢迎您回来！');
            return redirect()->intended(route('users.show', [Auth::user()]));
        } else {
            // 登录失败操作
            session()->flash('danger', '抱歉，您的账号或者密码有误，请重新登录！');
            return redirect()->back();
        }
    }

    public function destory()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
