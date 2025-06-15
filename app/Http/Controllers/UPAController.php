<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UPAController extends Controller
{
    public function compSession($id)
    {
        try {
            $query = DB::select("
                SELECT
                    pddg.idcomp,
                    pddc.CompCode,
                    pddc.CompName
                FROM
                    PchInvAndProject.devsk.dGroupCompMap pddg
                    LEFT JOIN PchInvAndProject.dbo.dCompany pddc ON pddg.idcomp = pddc.idComp
                WHERE
                    pddg.idcomp IN ( SELECT idcomp FROM [PchInvAndProject].[devsk].[dGroupCompMap] WHERE parentid IN ( $id ) AND stActive = 1 )
                    AND pddg.stActive = 1 AND pddg.idcomp != 5
                ORDER BY
                    pddg.idcomp
            ");
            if ($query) {
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Company retrieved successfully',
                    'data' => $query
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'Company not found',
                    'data' => null
                ], 404);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function compSessionSet($idSidebar, $idComp)
    {
        session(['idComp' => $idComp]);
        session(['GroupSidebar' => $idSidebar]);
        return redirect('/');
    }
    public function show()
    {
        $years = DB::select("
            SELECT DISTINCT
                CASE
                    WHEN LEN(YM) = 6 THEN LEFT(YM, 4)
                    WHEN LEN(YM) = 4 THEN YM
                    ELSE SUBSTRING(YM, 1, 4)
                END AS year
            FROM vVoucherMt
            WHERE idComp IN (
                SELECT idcomp FROM PchInvAndProject.devsk.dGroupCompMap
                WHERE idcomp IN (
                    SELECT idcomp FROM [PchInvAndProject].[devsk].[dGroupCompMap]
                    WHERE stActive = 1
                ) AND stActive = 1
            )
            AND Total IS NOT NULL
            AND Total <> 0
            ORDER BY year DESC
        ");


        return view('upa', compact('years'));
    }

    public function cost_dt($idComp, $year)
    {
        try {
            $cost = DB::select("
				SELECT
                    Nt.nameType,
                    Nt.sysModule,
                    (SELECT SUM(Total) FROM vVoucherMt AS Mt WHERE Nt.sysModule=Mt.sysModule AND Mt.idComp in (" . $idComp . ") And YM Like '%" . $year . "01') AS Md1_1,
                    (SELECT SUM(Total) FROM vVoucherMt AS Mt WHERE Nt.sysModule=Mt.sysModule AND Mt.idComp in (" . $idComp . ") And YM Like '%" . $year . "02') AS Md2_1,
                    (SELECT SUM(Total) FROM vVoucherMt AS Mt WHERE Nt.sysModule=Mt.sysModule AND Mt.idComp in (" . $idComp . ") And YM Like '%" . $year . "03') AS Md3_1,
                    (SELECT SUM(Total) FROM vVoucherMt AS Mt WHERE Nt.sysModule=Mt.sysModule AND Mt.idComp in (" . $idComp . ") And YM Like '%" . $year . "04') AS Md4_1,
                    (SELECT SUM(Total) FROM vVoucherMt AS Mt WHERE Nt.sysModule=Mt.sysModule AND Mt.idComp in (" . $idComp . ") And YM Like '%" . $year . "05') AS Md5_1,
                    (SELECT SUM(Total) FROM vVoucherMt AS Mt WHERE Nt.sysModule=Mt.sysModule AND Mt.idComp in (" . $idComp . ") And YM Like '%" . $year . "06') AS Md6_1,
                    (SELECT SUM(Total) FROM vVoucherMt AS Mt WHERE Nt.sysModule=Mt.sysModule AND Mt.idComp in (" . $idComp . ") And YM Like '%" . $year . "07') AS Md7_1,
                    (SELECT SUM(Total) FROM vVoucherMt AS Mt WHERE Nt.sysModule=Mt.sysModule AND Mt.idComp in (" . $idComp . ") And YM Like '%" . $year . "08') AS Md8_1,
                    (SELECT SUM(Total) FROM vVoucherMt AS Mt WHERE Nt.sysModule=Mt.sysModule AND Mt.idComp in (" . $idComp . ") And YM Like '%" . $year . "09') AS Md9_1,
                    (SELECT SUM(Total) FROM vVoucherMt AS Mt WHERE Nt.sysModule=Mt.sysModule AND Mt.idComp in (" . $idComp . ") And YM Like '%" . $year . "10') AS Md10_1,
                    (SELECT SUM(Total) FROM vVoucherMt AS Mt WHERE Nt.sysModule=Mt.sysModule AND Mt.idComp in (" . $idComp . ") And YM Like '%" . $year . "11') AS Md11_1,
                    (SELECT SUM(Total) FROM vVoucherMt AS Mt WHERE Nt.sysModule=Mt.sysModule AND Mt.idComp in (" . $idComp . ") And YM Like '%" . $year . "12') AS Md12_1,
                    (SELECT SUM(Total) FROM vVoucherMt AS Mt WHERE Nt.sysModule=Mt.sysModule AND Mt.idComp in (" . $idComp . ") And YM Like '%" . $year . "%') AS dTotal_1
                FROM ExpNumType AS Nt
                WHERE Nt.UPA='1'
                ORDER BY idType ASC
			");

            if ($cost) {
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Cost retrieved successfully',
                    'data' => $cost
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'Cost not found',
                    'data' => null
                ], 404);
            }
        } catch (\Throwable $th) {
            Log::error('Error in cost function: ' . $th->getMessage());
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
    public function cost_mt($idComp, $year)
    {
        try {
            $cost_mt = collect(DB::select("
                SELECT Com.idComp,Com.CompName,
                (SELECT SUM(Total) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND  YM Like '%" . $year . "01') AS M1_1,
                (SELECT SUM(Total) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND  YM Like '%" . $year . "02') AS M2_1,
                (SELECT SUM(Total) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND  YM Like '%" . $year . "03') AS M3_1,
                (SELECT SUM(Total) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND  YM Like '%" . $year . "04') AS M4_1,
                (SELECT SUM(Total) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND  YM Like '%" . $year . "05') AS M5_1,
                (SELECT SUM(Total) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND  YM Like '%" . $year . "06') AS M6_1,
                (SELECT SUM(Total) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND  YM Like '%" . $year . "07') AS M7_1,
                (SELECT SUM(Total) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND  YM Like '%" . $year . "08') AS M8_1,
                (SELECT SUM(Total) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND  YM Like '%" . $year . "09') AS M9_1,
                (SELECT SUM(Total) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND  YM Like '%" . $year . "10') AS M10_1,
                (SELECT SUM(Total) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND  YM Like '%" . $year . "11') AS M11_1,
                (SELECT SUM(Total) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND  YM Like '%" . $year . "12') AS M12_1,
                (SELECT SUM(Total) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND  YM Like '%" . $year . "%') AS Total_1
                FROM dCompany As Com
                WHERE Com.idComp IN (SELECT idcomp FROM PchInvAndProject.devsk.dGroupCompMap WHERE idcomp IN (Select idcomp FROM [PchInvAndProject].[devsk].[dGroupCompMap] WHERE idcomp IN (" . $idComp . ") And stActive = 1)  AND stActive = 1)
                ORDER BY Com.idComp ASC
            "));

            if ($cost_mt) {
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Cost retrieved successfully',
                    'data' => $cost_mt
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'Cost not found',
                    'data' => null
                ], 404);
            }
        } catch (\Throwable $th) {
            Log::error('Error in cost function: ' . $th->getMessage());
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function cost_change_year($year)
    {
        session(['year' => $year]);
        return redirect()->back();
    }
}