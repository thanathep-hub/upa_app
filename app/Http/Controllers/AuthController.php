<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->input("username") != '' && $request->input("password") != '') {
            return redirect('/wel');
        } else {
            return back()->withErrors(['msg' => 'รหัสผู้ใช้หรือรหัสผ่านไม่ถูกต้อง']);
        }
    }
}