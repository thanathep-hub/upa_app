<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = $request->input("username");
        $password = $request->input("password");

        if ($request->input("username") != '' && $request->input("password") != '') {
            $query = "SELECT * FROM GR_Group.dbo.dEmployee WHERE GR_Group.dbo.dEmployee.UN = '$user' AND GR_Group.dbo.dEmployee.PW = '$password'";
            try {
                $login = collect(DB::select($query))->first();
            } catch (\Throwable $th) {
                //throw $th;
            }
            $login = collect(DB::select($query))->first();
            if ($login) {
                session()->put("user", $login);

                if ($login->idPositions === '17' || $login->idPositions === '15') {
                    session()->put("role", "admin");
                }
                if ($login->idPositions != 17 && $login->idPositions != 15) {
                    session()->put("role", "user");
                }

                $previousUrl = Session::get('previous_url', '/');
                Session::forget('previous_url');

                return redirect()->to($previousUrl);
            }
        } else {
            return back()->withErrors(['msg' => 'รหัสผู้ใช้หรือรหัสผ่านไม่ถูกต้อง']);
        }
    }
    public function userLogout()
    {
        session()->flush();
        return redirect('/login');
    }
}
