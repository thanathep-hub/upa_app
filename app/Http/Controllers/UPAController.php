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
        return view('upa');
    }

    public function cost_dt($idComp, $year)
    {
        try {
            $cost = DB::select("
				SELECT
					Nt.nameType,
					Nt.sysModule,
					3 AS idComp,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank = '1'
							AND YM LIKE '%" . $year . "01'
						),
						0
					) AS Md1_1,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank IS NULL
							AND YM LIKE '%" . $year . "01'
						),
						0
					) AS Md1_2,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank = '1'
							AND YM LIKE '%" . $year . "02'
						),
						0
					) AS Md2_1,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank IS NULL
							AND YM LIKE '%" . $year . "02'
						),
						0
					) AS Md2_2,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank = '1'
							AND YM LIKE '%" . $year . "03'
						),
						0
					) AS Md3_1,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank IS NULL
							AND YM LIKE '%" . $year . "03'
						),
						0
					) AS Md3_2,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank = '1'
							AND YM LIKE '%" . $year . "04'
						),
						0
					) AS Md4_1,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank IS NULL
							AND YM LIKE '%" . $year . "04'
						),
						0
					) AS Md4_2,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank = '1'
							AND YM LIKE '%" . $year . "05'
						),
						0
					) AS Md5_1,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank IS NULL
							AND YM LIKE '%" . $year . "05'
						),
						0
					) AS Md5_2,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank = '1'
							AND YM LIKE '%" . $year . "06'
						),
						0
					) AS Md6_1,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank IS NULL
							AND YM LIKE '%" . $year . "06'
						),
						0
					) AS Md6_2,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank = '1'
							AND YM LIKE '%" . $year . "07'
						),
						0
					) AS Md7_1,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank IS NULL
							AND YM LIKE '%" . $year . "07'
						),
						0
					) AS Md7_2,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank = '1'
							AND YM LIKE '%" . $year . "08'
						),
						0
					) AS Md8_1,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank IS NULL
							AND YM LIKE '%" . $year . "08'
						),
						0
					) AS Md8_2,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank = '1'
							AND YM LIKE '%" . $year . "09'
						),
						0
					) AS Md9_1,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank IS NULL
							AND YM LIKE '%" . $year . "09'
						),
						0
					) AS Md9_2,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank = '1'
							AND YM LIKE '%" . $year . "10'
						),
						0
					) AS Md10_1,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank IS NULL
							AND YM LIKE '%" . $year . "10'
						),
						0
					) AS Md10_2,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank = '1'
							AND YM LIKE '%" . $year . "11'
						),
						0
					) AS Md11_1,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank IS NULL
							AND YM LIKE '%" . $year . "11'
						),
						0
					) AS Md11_2,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank = '1'
							AND YM LIKE '%" . $year . "12'
						),
						0
					) AS Md12_1,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank IS NULL
							AND YM LIKE '%" . $year . "12'
						),
						0
					) AS Md12_2,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank = '1'
							AND YM LIKE '%" . $year . "%'
						),
						0
					) AS dTotal_1,
					ISNULL(
						(
						SELECT SUM
							( Total )
						FROM
							vVoucherMt AS Mt
						WHERE
							Nt.sysModule= Mt.sysModule
							AND Mt.idComp = $idComp
							AND stGetBank IS NULL
							AND YM LIKE '%" . $year . "%'
						),
						0
					) AS dTotal_2
				FROM
					ExpNumType AS Nt
				ORDER BY
					idType ASC
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
                SELECT
                    Com.idComp,
                    Com.CompName,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank = '1' AND YM LIKE '%" . $year . "01' ), 0 ) AS M1_1,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank IS NULL AND YM LIKE '%" . $year . "01' ), 0 ) AS M1_2,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank = '1' AND YM LIKE '%" . $year . "02' ), 0 ) AS M2_1,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank IS NULL AND YM LIKE '%" . $year . "02' ), 0 ) AS M2_2,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank = '1' AND YM LIKE '%" . $year . "03' ), 0 ) AS M3_1,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank IS NULL AND YM LIKE '%" . $year . "03' ), 0 ) AS M3_2,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank = '1' AND YM LIKE '%" . $year . "04' ), 0 ) AS M4_1,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank IS NULL AND YM LIKE '%" . $year . "04' ), 0 ) AS M4_2,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank = '1' AND YM LIKE '%" . $year . "05' ), 0 ) AS M5_1,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank IS NULL AND YM LIKE '%" . $year . "05' ), 0 ) AS M5_2,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank = '1' AND YM LIKE '%" . $year . "06' ), 0 ) AS M6_1,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank IS NULL AND YM LIKE '%" . $year . "06' ), 0 ) AS M6_2,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank = '1' AND YM LIKE '%" . $year . "07' ), 0 ) AS M7_1,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank IS NULL AND YM LIKE '%" . $year . "07' ), 0 ) AS M7_2,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank = '1' AND YM LIKE '%" . $year . "08' ), 0 ) AS M8_1,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank IS NULL AND YM LIKE '%" . $year . "08' ), 0 ) AS M8_2,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank = '1' AND YM LIKE '%" . $year . "09' ), 0 ) AS M9_1,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank IS NULL AND YM LIKE '%" . $year . "09' ), 0 ) AS M9_2,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank = '1' AND YM LIKE '%" . $year . "10' ), 0 ) AS M10_1,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank IS NULL AND YM LIKE '%" . $year . "10' ), 0 ) AS M10_2,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank = '1' AND YM LIKE '%" . $year . "11' ), 0 ) AS M11_1,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank IS NULL AND YM LIKE '%" . $year . "11' ), 0 ) AS M11_2,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank = '1' AND YM LIKE '%" . $year . "12' ), 0 ) AS M12_1,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank IS NULL AND YM LIKE '%" . $year . "12' ), 0 ) AS M12_2,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank = '1' AND YM LIKE '%" . $year . "%' ), 0 ) AS Total_1,
                    ISNULL( ( SELECT SUM ( Total ) FROM vVoucherMt WHERE Com.idComp= vVoucherMt.idComp AND stGetBank IS NULL AND YM LIKE '%" . $year . "%' ), 0 ) AS Total_2
                FROM
                    dCompany AS Com
                WHERE
                    Com.idComp IN (
                    SELECT
                        idcomp
                    FROM
                        PchInvAndProject.devsk.dGroupCompMap
                    WHERE
                        idcomp IN ( SELECT idcomp FROM [PchInvAndProject].[devsk].[dGroupCompMap] WHERE parentid IN(1,2,3) AND stActive = 1 )
                        AND stActive = 1
                    ) AND Com.idComp = $idComp
                ORDER BY
                    Com.idComp ASC
            "))->first();
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
