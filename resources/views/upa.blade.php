@extends('layouts.app')
@section('title', 'UPA')
@section('content')
    <style>
        * {
            font-family: "Kanit", sans-serif;
            font-size: 14px;
            font-weight: 500;
            color: #000000;
        }

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

        .w-160 {
            min-width: 160px;
        }
    </style>
    <h3 style="font-weight: 700;">รวมค่าใช้จ่าย</h3>
    <div class="card p-4 border-0 mb-3" style="background-color:#f9fafb;">
        <div class="d-flex justify-content-between">
            <h5 class="mb-3" style="font-weight: 700;color:#374151;" id="name-comp-cost">บริษัท ...</h5>
            <div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false" style="background-color: #f3f4f6;color:#374151;border:none;">
                        ปี 2567
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">2567</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="w-160">
                <span>ค่าใช้จ่าย</span>
                <h5 style="color: #eab308;font-family: 'Kanit', sans-serif;" id="expenses">00.00</h5>
            </div>
            <div class="w-160">
                <span>ค้างจ่าย</span>
                <h5 style="color: #ef4444;" id="pending">00.00</h5>
            </div>
            <div class="w-160">
                <span>จ่ายไปแล้ว</span>
                <h5 style="color: #22c55e;" id="paid">00.00</h5>
            </div>
        </div>

    </div>
    <div class="card border-0">
        <div class="head-cost">
            <div class="mb-3">
                <div class="table-responsive">
                    <table class="table table-bordered" style="overflow-x: auto;" id="cost-mt">
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
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                                <td>กำลังโหลด...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="detail-cost mt-4">
            <div class="table-responsive">
                <table class="table table-bordered" style="overflow-x: auto;" id="cost-dt">
                    <thead>
                        <tr>
                            <th class="index sticky-col first-col"></th>
                            <th scope="col" class="sticky-col second-col"
                                style="align-content: center;text-align: center;">
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
                            <td class="sticky-col second-col text-start">กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                            <td>กำลังโหลด...</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            fetch_upa_mt();
            fetch_upa_dt();

            if ({{ session('GroupSidebar') }} === 1) {
                document.getElementById("av-group").classList.add("show");
                console.log("session log", {{ session('GroupSidebar') }});
            }
            if ({{ session('GroupSidebar') }} === 2) {
                document.getElementById("gr-group").classList.add("show");
                console.log("session log", 2);
            }
            if ({{ session('GroupSidebar') }} === 3) {
                document.getElementById("fl-group").classList.add("show");
                console.log("session log", 3);
            }
        });

        function fetch_upa_dt() {
            const idComp = '{{ session('idComp') }}';
            const year = '{{ session('year') }}';
            console.log("Fetching data with ID:", idComp, "and Year:", year);

            $.ajax({
                type: "get",
                url: `/fetch/upa/cost_dt/${idComp}/${year}`,
                success: function(response) {
                    if (response.status === 'success') {
                        let cost = response.data;

                        let tbody = $('#cost-dt tbody');
                        tbody.empty();

                        // Check if response is an array
                        if (Array.isArray(cost)) {
                            if (cost.length > 0) {
                                cost.forEach((item, index) => {
                                    let row = `
                                        <tr>
                                            <td class="sticky-col first-col">${index + 1}</td>
                                            <td class="sticky-col second-col text-start">${item.nameType || ''}</td>
                                            <td>${formatNumber(item.Md1_1)}</td>
                                            <td>${formatNumber(item.Md1_2)}</td>
                                            <td>${formatNumber(item.Md2_1)}</td>
                                            <td>${formatNumber(item.Md2_2)}</td>
                                            <td>${formatNumber(item.Md3_1)}</td>
                                            <td>${formatNumber(item.Md3_2)}</td>
                                            <td>${formatNumber(item.Md4_1)}</td>
                                            <td>${formatNumber(item.Md4_2)}</td>
                                            <td>${formatNumber(item.Md5_1)}</td>
                                            <td>${formatNumber(item.Md5_2)}</td>
                                            <td>${formatNumber(item.Md6_1)}</td>
                                            <td>${formatNumber(item.Md6_2)}</td>
                                            <td>${formatNumber(item.Md7_1)}</td>
                                            <td>${formatNumber(item.Md7_2)}</td>
                                            <td>${formatNumber(item.Md8_1)}</td>
                                            <td>${formatNumber(item.Md8_2)}</td>
                                            <td>${formatNumber(item.Md9_1)}</td>
                                            <td>${formatNumber(item.Md9_2)}</td>
                                            <td>${formatNumber(item.Md10_1)}</td>
                                            <td>${formatNumber(item.Md10_2)}</td>
                                            <td>${formatNumber(item.Md11_1)}</td>
                                            <td>${formatNumber(item.Md11_2)}</td>
                                            <td>${formatNumber(item.Md12_1)}</td>
                                            <td>${formatNumber(item.Md12_2)}</td>

                                        </tr>
                                    `;
                                    setTimeout(function() {
                                        tbody.append(row);
                                    }, index * 75);
                                });
                            } else {
                                tbody.append('<tr><td colspan="24">No data available</td></tr>');
                            }
                        } else {
                            console.error('Expected array but received:', typeof response, response);
                            $('#cost-dt tbody').append('<tr><td colspan="24">Unexpected data format</td></tr>');
                        }
                    } else {
                        console.log('Error:', response.msg);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('There was a problem with your request:', textStatus, errorThrown);
                }
            });
        }

        function fetch_upa_mt() {
            const idComp = '{{ session('idComp') }}';
            const year = '{{ session('year') }}';
            console.log("Fetching data with ID:", idComp, "and Year:", year);

            $.ajax({
                type: "get",
                url: `/fetch/upa/cost_mt/${idComp}/${year}`,
                success: function(response) {
                    console.log(response);

                    let tbody = $('#cost-mt tbody');
                    tbody.empty();

                    if (response.status === 'success') {
                        let cost_mt = response.data;
                        const ex = parseFloat(cost_mt.Total_1);
                        const pe = parseFloat(cost_mt.Total_2);
                        const pa = ex - pe;
                        document.getElementById('name-comp-cost').innerText = cost_mt.CompName;
                        document.getElementById('expenses').innerText = '฿' + formatNumber(cost_mt.Total_1);
                        document.getElementById('pending').innerText = '฿' + formatNumber(cost_mt.Total_2);
                        document.getElementById('paid').innerText = '฿' + formatNumber(pa);

                        if (cost_mt) {
                            // Dynamically create rows based on the keys of cost_mt
                            let row = '<tr>';
                            for (let i = 1; i <= 12; i++) {
                                row += `
                            <td>${formatNumber(cost_mt[`M${i}_1`])}</td>
                            <td>${formatNumber(cost_mt[`M${i}_2`])}</td>
                        `;
                            }
                            row += '</tr>';
                            setTimeout(() => {
                                tbody.append(row);
                            }, 75);
                        } else {
                            tbody.append('<tr><td colspan="24">No data available</td></tr>');
                        }
                    } else {
                        console.log('Error:', response.msg);
                        tbody.append('<tr><td colspan="24">No data available</td></tr>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('There was a problem with your request:', textStatus, errorThrown);
                    $('#cost-mt tbody').append(
                        '<tr><td colspan="24">There was an error fetching the data. Please try again later.</td></tr>'
                    );
                }
            });
        }



        function formatNumber(num) {
            return num ? parseFloat(num).toLocaleString(undefined, {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }) : '';
        }
    </script>
@endpush
