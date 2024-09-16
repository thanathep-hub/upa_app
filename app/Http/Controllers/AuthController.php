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
                session()->put("idComp", $login->idCompb);
                session()->put("year", date('Y') + 543);
                session()->put("GroupSidebar", $this->groupComp($login->idPs));

                if ($login->idPosition === '17' || $login->idPosition === '15' ||  $login->idPosition === '171') {
                    session()->put("role", "admin");
                }
                if ($login->idPosition != '17' && $login->idPosition != '15' && $login->idPosition === '171') {
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
    public function groupComp($id)
    {
        $query = collect(DB::select("
            SELECT
                gdde.idCompb,
                pddc.CompCode,
                pddc.CompName,
                pddg.parentid
            FROM
                GR_Group.dbo.dEmployee gdde
                LEFT JOIN PchInvAndProject.dbo.dCompany pddc ON gdde.idComp = pddc.idComp
                LEFT JOIN PchInvAndProject.devsk.dGroupCompMap pddg ON gdde.idCompb = pddg.idcomp
            WHERE
                gdde.idPs = $id
        "))->first();
        if ($query) {
            return $query->parentid;
        }
    }
    public function userLogout()
    {
        session()->flush();
        return redirect('/login');
    }
}
