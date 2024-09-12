<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UPAController extends Controller
{
    public function show()
    {
        return view('upa');
    }

    public function cost($idComp, $year)
    {
        try {
            $cost = "
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
			AND Mt.idComp = 3
			AND stGetBank = '1'
			AND YM LIKE '%$year" + "01'
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
			AND Mt.idComp = 3
			AND stGetBank IS NULL
			AND YM LIKE '%256701'
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
			AND Mt.idComp = 3
			AND stGetBank = '1'
			AND YM LIKE '%256702'
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
			AND Mt.idComp = 3
			AND stGetBank IS NULL
			AND YM LIKE '%256702'
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
			AND Mt.idComp = 3
			AND stGetBank = '1'
			AND YM LIKE '%256703'
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
			AND Mt.idComp = 3
			AND stGetBank IS NULL
			AND YM LIKE '%256703'
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
			AND Mt.idComp = 3
			AND stGetBank = '1'
			AND YM LIKE '%256704'
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
			AND Mt.idComp = 3
			AND stGetBank IS NULL
			AND YM LIKE '%256704'
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
			AND Mt.idComp = 3
			AND stGetBank = '1'
			AND YM LIKE '%256705'
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
			AND Mt.idComp = 3
			AND stGetBank IS NULL
			AND YM LIKE '%256705'
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
			AND Mt.idComp = 3
			AND stGetBank = '1'
			AND YM LIKE '%256706'
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
			AND Mt.idComp = 3
			AND stGetBank IS NULL
			AND YM LIKE '%256706'
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
			AND Mt.idComp = 3
			AND stGetBank = '1'
			AND YM LIKE '%256707'
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
			AND Mt.idComp = 3
			AND stGetBank IS NULL
			AND YM LIKE '%256707'
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
			AND Mt.idComp = 3
			AND stGetBank = '1'
			AND YM LIKE '%256708'
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
			AND Mt.idComp = 3
			AND stGetBank IS NULL
			AND YM LIKE '%256708'
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
			AND Mt.idComp = 3
			AND stGetBank = '1'
			AND YM LIKE '%256709'
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
			AND Mt.idComp = 3
			AND stGetBank IS NULL
			AND YM LIKE '%256709'
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
			AND Mt.idComp = 3
			AND stGetBank = '1'
			AND YM LIKE '%256710'
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
			AND Mt.idComp = 3
			AND stGetBank IS NULL
			AND YM LIKE '%256710'
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
			AND Mt.idComp = 3
			AND stGetBank = '1'
			AND YM LIKE '%256711'
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
			AND Mt.idComp = 3
			AND stGetBank IS NULL
			AND YM LIKE '%256711'
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
			AND Mt.idComp = 3
			AND stGetBank = '1'
			AND YM LIKE '%256712'
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
			AND Mt.idComp = 3
			AND stGetBank IS NULL
			AND YM LIKE '%256712'
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
			AND Mt.idComp = 3
			AND stGetBank = '1'
			AND YM LIKE '%2567%'
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
			AND Mt.idComp = 3
			AND stGetBank IS NULL
			AND YM LIKE '%2567%'
		),
		0
	) AS dTotal_2
FROM
	ExpNumType AS Nt
ORDER BY
	idType ASC
            ";

            dd($cost);
        } catch (\Throwable $th) {
            Log::error('Error in cost function: ' . $th->getMessage());
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}
