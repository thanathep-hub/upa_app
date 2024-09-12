@extends('layouts.app')
@section('title', 'UPA')
@section('content')
    <style>
        tr {
            white-space: nowrap;
        }

        th {
            /* min-width: 250px; */
        }

        td {
            text-align: end;
            width: 124.5px;
        }

        .trr {
            width: 125px;
            height: 36px;
            align-content: center;
        }

        .text-center,
        .border-bottom {
            height: 36px;
            align-content: center;
        }

        .sticky-col {
            position: -webkit-sticky;
            position: sticky;
            background-color: white;
        }

        .first-col {
            width: 40px;
            min-width: 40px;
            max-width: 40px;
            left: 0px;
            text-align: center;
        }

        .second-col {
            width: 160px;
            min-width: 160px;
            max-width: 160px;
            left: 40px;
        }

        .w-250 {
            min-width: 250px;
        }
    </style>
    <h3 style="font-weight: 700;">รวมค่าใช้จ่าย</h3>
    <div class="card">
        <div class="head-cost">
            <div class="mb-3">
                <div class="table-responsive">
                    <table class="table table-bordered" style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th colspan="2" class="p-0 w-250">
                                    <div class="text-center border-bottom">ม.ค.</div>
                                    <div class="d-flex w-100 text-center">
                                        <div class="trr border-end">ค่าใช้จ่าย</div>
                                        <div class="trr">ค้างจ่าย</div>
                                    </div>
                                </th>

                                <th colspan="2" class="p-0">
                                    <div class="text-center border-bottom">ก.พ.</div>
                                    <div class="d-flex w-100 text-center">
                                        <div class="trr border-end">ค่าใช้จ่าย</div>
                                        <div class="trr">ค้างจ่าย</div>
                                    </div>
                                </th>
                                <th colspan="2" class="p-0">
                                    <div class="text-center border-bottom">มี.ค.</div>
                                    <div class="d-flex w-100 text-center">
                                        <div class="trr border-end">ค่าใช้จ่าย</div>
                                        <div class="trr">ค้างจ่าย</div>
                                    </div>
                                </th>
                                <th colspan="2" class="p-0">
                                    <div class="text-center border-bottom">เม.ย.</div>
                                    <div class="d-flex w-100 text-center">
                                        <div class="trr border-end">ค่าใช้จ่าย</div>
                                        <div class="trr">ค้างจ่าย</div>
                                    </div>
                                </th>
                                <th colspan="2" class="p-0">
                                    <div class="text-center border-bottom">พ.ค.</div>
                                    <div class="d-flex w-100 text-center">
                                        <div class="trr border-end">ค่าใช้จ่าย</div>
                                        <div class="trr">ค้างจ่าย</div>
                                    </div>
                                </th>
                                <th colspan="2" class="p-0">
                                    <div class="text-center border-bottom">มิ.ย.</div>
                                    <div class="d-flex w-100 text-center">
                                        <div class="trr border-end">ค่าใช้จ่าย</div>
                                        <div class="trr">ค้างจ่าย</div>
                                    </div>
                                </th>
                                <th colspan="2" class="p-0">
                                    <div class="text-center border-bottom">ก.ค.</div>
                                    <div class="d-flex w-100 text-center">
                                        <div class="trr border-end">ค่าใช้จ่าย</div>
                                        <div class="trr">ค้างจ่าย</div>
                                    </div>
                                </th>
                                <th colspan="2" class="p-0">
                                    <div class="text-center border-bottom">ส.ค.</div>
                                    <div class="d-flex w-100 text-center">
                                        <div class="trr border-end">ค่าใช้จ่าย</div>
                                        <div class="trr">ค้างจ่าย</div>
                                    </div>
                                </th>
                                <th colspan="2" class="p-0">
                                    <div class="text-center border-bottom">ก.ย.</div>
                                    <div class="d-flex w-100 text-center">
                                        <div class="trr border-end">ค่าใช้จ่าย</div>
                                        <div class="trr">ค้างจ่าย</div>
                                    </div>
                                </th>
                                <th colspan="2" class="p-0">
                                    <div class="text-center border-bottom">ต.ค.</div>
                                    <div class="d-flex w-100 text-center">
                                        <div class="trr border-end">ค่าใช้จ่าย</div>
                                        <div class="trr">ค้างจ่าย</div>
                                    </div>
                                </th>
                                <th colspan="2" class="p-0">
                                    <div class="text-center border-bottom">พ.ย.</div>
                                    <div class="d-flex w-100 text-center">
                                        <div class="trr border-end">ค่าใช้จ่าย</div>
                                        <div class="trr">ค้างจ่าย</div>
                                    </div>
                                </th>
                                <th colspan="2" class="p-0">
                                    <div class="text-center border-bottom">ธ.ค.</div>
                                    <div class="d-flex w-100 text-center">
                                        <div class="trr border-end">ค่าใช้จ่าย</div>
                                        <div class="trr">ค้างจ่าย</div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>3036.74</td>
                                <td>450.00</td>
                                <td>2000.00</td>
                                <td>500.00</td>
                                <td>1000.00</td>
                                <td>300.00</td>
                                <td>500.00</td>
                                <td>200.00</td>
                                <td>1500.00</td>
                                <td>100.00</td>
                                <td>200.00</td>
                                <td>500.00</td>
                                <td>200.00</td>
                                <td>1000.00</td>
                                <td>250.00</td>
                                <td>3000.00</td>
                                <td>400.00</td>
                                <td>1000.00</td>
                                <td>300.00</td>
                                <td>2500.00</td>
                                <td>600.00</td>
                                <td>1200.00</td>
                                <td>200.00</td>
                                <td>1500.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="detail-cost mt-4">
            <div class="table-responsive">
                <table class="table table-bordered" style="overflow-x: auto;">
                    <thead>
                        <tr>
                            <th class="index sticky-col first-col"></th>
                            <th scope="col" class="sticky-col second-col">
                                <div>ประเภทค่าใช้จ่าย</div>
                            </th>
                            <th colspan="2" class="p-0 w-250">
                                <div class="text-center border-bottom">ม.ค.</div>
                                <div class="d-flex w-100 text-center">
                                    <div class="trr border-end">ค่าใช้จ่าย</div>
                                    <div class="trr">ค้างจ่าย</div>
                                </div>
                            </th>

                            <th colspan="2" class="p-0">
                                <div class="text-center border-bottom">ก.พ.</div>
                                <div class="d-flex w-100 text-center">
                                    <div class="trr border-end">ค่าใช้จ่าย</div>
                                    <div class="trr">ค้างจ่าย</div>
                                </div>
                            </th>
                            <th colspan="2" class="p-0">
                                <div class="text-center border-bottom">มี.ค.</div>
                                <div class="d-flex w-100 text-center">
                                    <div class="trr border-end">ค่าใช้จ่าย</div>
                                    <div class="trr">ค้างจ่าย</div>
                                </div>
                            </th>
                            <th colspan="2" class="p-0">
                                <div class="text-center border-bottom">เม.ย.</div>
                                <div class="d-flex w-100 text-center">
                                    <div class="trr border-end">ค่าใช้จ่าย</div>
                                    <div class="trr">ค้างจ่าย</div>
                                </div>
                            </th>
                            <th colspan="2" class="p-0">
                                <div class="text-center border-bottom">พ.ค.</div>
                                <div class="d-flex w-100 text-center">
                                    <div class="trr border-end">ค่าใช้จ่าย</div>
                                    <div class="trr">ค้างจ่าย</div>
                                </div>
                            </th>
                            <th colspan="2" class="p-0">
                                <div class="text-center border-bottom">มิ.ย.</div>
                                <div class="d-flex w-100 text-center">
                                    <div class="trr border-end">ค่าใช้จ่าย</div>
                                    <div class="trr">ค้างจ่าย</div>
                                </div>
                            </th>
                            <th colspan="2" class="p-0">
                                <div class="text-center border-bottom">ก.ค.</div>
                                <div class="d-flex w-100 text-center">
                                    <div class="trr border-end">ค่าใช้จ่าย</div>
                                    <div class="trr">ค้างจ่าย</div>
                                </div>
                            </th>
                            <th colspan="2" class="p-0">
                                <div class="text-center border-bottom">ส.ค.</div>
                                <div class="d-flex w-100 text-center">
                                    <div class="trr border-end">ค่าใช้จ่าย</div>
                                    <div class="trr">ค้างจ่าย</div>
                                </div>
                            </th>
                            <th colspan="2" class="p-0">
                                <div class="text-center border-bottom">ก.ย.</div>
                                <div class="d-flex w-100 text-center">
                                    <div class="trr border-end">ค่าใช้จ่าย</div>
                                    <div class="trr">ค้างจ่าย</div>
                                </div>
                            </th>
                            <th colspan="2" class="p-0">
                                <div class="text-center border-bottom">ต.ค.</div>
                                <div class="d-flex w-100 text-center">
                                    <div class="trr border-end">ค่าใช้จ่าย</div>
                                    <div class="trr">ค้างจ่าย</div>
                                </div>
                            </th>
                            <th colspan="2" class="p-0">
                                <div class="text-center border-bottom">พ.ย.</div>
                                <div class="d-flex w-100 text-center">
                                    <div class="trr border-end">ค่าใช้จ่าย</div>
                                    <div class="trr">ค้างจ่าย</div>
                                </div>
                            </th>
                            <th colspan="2" class="p-0">
                                <div class="text-center border-bottom">ธ.ค.</div>
                                <div class="d-flex w-100 text-center">
                                    <div class="trr border-end">ค่าใช้จ่าย</div>
                                    <div class="trr">ค้างจ่าย</div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="sticky-col first-col">1</td>
                            <td class="sticky-col second-col text-start">ค่าโทรศัพท์</td>
                            <td>3036.74</td>
                            <td>450.00</td>
                            <td>2000.00</td>
                            <td>500.00</td>
                            <td>1000.00</td>
                            <td>300.00</td>
                            <td>500.00</td>
                            <td>200.00</td>
                            <td>1500.00</td>
                            <td>100.00</td>
                            <td>200.00</td>
                            <td>500.00</td>
                            <td>200.00</td>
                            <td>1000.00</td>
                            <td>250.00</td>
                            <td>3000.00</td>
                            <td>400.00</td>
                            <td>1000.00</td>
                            <td>300.00</td>
                            <td>2500.00</td>
                            <td>600.00</td>
                            <td>1200.00</td>
                            <td>200.00</td>
                            <td>1500.00</td>
                        </tr>
                        <tr>
                            <td class="sticky-col first-col">2</td>
                            <td class="sticky-col second-col text-start">ค่าอินเตอร์เน็ต</td>
                            <td>3036.74</td>
                            <td>450.00</td>
                            <td>2000.00</td>
                            <td>500.00</td>
                            <td>1000.00</td>
                            <td>300.00</td>
                            <td>500.00</td>
                            <td>200.00</td>
                            <td>1500.00</td>
                            <td>100.00</td>
                            <td>200.00</td>
                            <td>500.00</td>
                            <td>200.00</td>
                            <td>1000.00</td>
                            <td>250.00</td>
                            <td>3000.00</td>
                            <td>400.00</td>
                            <td>1000.00</td>
                            <td>300.00</td>
                            <td>2500.00</td>
                            <td>600.00</td>
                            <td>1200.00</td>
                            <td>200.00</td>
                            <td>1500.00</td>
                        </tr>
                        <tr>
                            <td class="sticky-col first-col">3</td>
                            <td class="sticky-col second-col text-start">ค่าธรรมเนียมธนาคาร</td>
                            <td>3036.74</td>
                            <td>450.00</td>
                            <td>2000.00</td>
                            <td>500.00</td>
                            <td>1000.00</td>
                            <td>300.00</td>
                            <td>500.00</td>
                            <td>200.00</td>
                            <td>1500.00</td>
                            <td>100.00</td>
                            <td>200.00</td>
                            <td>500.00</td>
                            <td>200.00</td>
                            <td>1000.00</td>
                            <td>250.00</td>
                            <td>3000.00</td>
                            <td>400.00</td>
                            <td>1000.00</td>
                            <td>300.00</td>
                            <td>2500.00</td>
                            <td>600.00</td>
                            <td>1200.00</td>
                            <td>200.00</td>
                            <td>1500.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
