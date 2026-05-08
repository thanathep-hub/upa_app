@extends('layouts.app')
@section('title', 'UPA')
@section('content')
    <style>
        /* ── Base ── */
        * {
            font-family: 'Sarabun', sans-serif;
            font-size: 13.5px;
            color: #111827;
        }

        tr {
            white-space: nowrap;
        }

        /* ── Row interactions ── */
        tr:hover td {
            background-color: #f9fafb;
            cursor: pointer;
        }

        tr.tr-active td {
            background-color: #eef0fb;
        }

        /* ── Cells ── */
        td {
            text-align: end;
            min-width: 60px;
            width: 125px;
            font-weight: 400;
            padding: 6px 10px !important;
            vertical-align: middle;
        }

        th {
            font-weight: 500;
            font-size: 12px;
            color: #6b7280;
        }

        /* ── Year dropdown ── */
        button.btn.btn-secondary.dropdown-toggle {
            border: 1px solid #e5e7eb;
            height: 34px;
            padding: 0 14px;
            background-color: #ffffff;
            color: #374151;
            font-size: 13px;
            font-weight: 500;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            width: unset !important;
        }

        .dropdown-menu {
            --bs-dropdown-min-width: 110px;
            border: 1px solid #f3f4f6;
            border-radius: 10px;
            padding: 4px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }

        a.dropdown-item {
            text-align: center;
            border-radius: 6px;
            font-size: 13px;
            padding: 6px 12px;
            color: #374151;
        }

        a.dropdown-item:hover {
            background-color: #f3f4f6;
            color: #111827;
        }

        /* ── Helper widths ── */
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

        .w-250 {
            min-width: 250px;
        }

        .w-160 {
            min-width: 160px;
        }

        /* ── Sticky columns ── */
        .sticky-col {
            position: -webkit-sticky;
            position: sticky;
            background-color: #ffffff;
        }

        .first-col {
            width: 40px;
            min-width: 40px;
            max-width: 40px;
            left: 0;
            text-align: center;
        }

        .second-col {
            width: 140px;
            min-width: 140px;
            max-width: 140px;
            left: 40px;
        }

        .bg-scroll {
            background-color: #f9fafb !important;
            border-color: #f9fafb !important;
            border: unset;
        }

        /* ── Skeleton loading ── */
        @keyframes skeleton-shimmer {
            0% {
                background-position: -600px 0;
            }

            100% {
                background-position: 600px 0;
            }
        }

        .skeleton {
            display: inline-block;
            width: 100%;
            height: 14px;
            border-radius: 6px;
            background: linear-gradient(90deg, #e5e7eb 25%, #f3f4f6 50%, #e5e7eb 75%);
            background-size: 600px 100%;
            animation: skeleton-shimmer 1.4s ease-in-out infinite;
        }

        .skeleton-sm {
            height: 11px;
        }

        .skeleton-w40 {
            width: 40%;
        }

        .skeleton-w60 {
            width: 60%;
        }

        .skeleton-w80 {
            width: 80%;
        }

        tr.skeleton-row td {
            padding: 10px 8px;
            vertical-align: middle;
        }

        /* ── Section label ── */
        .section-label {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #9ca3af;
            margin-bottom: 2px;
        }

        /* ── Stat card ── */
        .stat-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-left: 4px solid #211e53;
            border-radius: 12px;
            padding: 1.25rem 1.5rem;
            box-shadow: 0 2px 8px rgba(33, 30, 83, 0.08);
            min-width: 280px;
        }

        .stat-amount {
            font-size: 2.25rem;
            font-weight: 800;
            color: #211e53;
            line-height: 1.1;
            font-variant-numeric: tabular-nums;
            letter-spacing: -1px;
        }

        /* ── Table card ── */
        .table-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
        }

        .table-card .table {
            margin-bottom: 0;
        }

        .section-title {
            font-size: 12px;
            font-weight: 700;
            color: #211e53;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 0.875rem 1rem 0.75rem;
            border-bottom: 2px solid #eef0fb;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-title::before {
            content: '';
            display: inline-block;
            width: 4px;
            height: 14px;
            background: #211e53;
            border-radius: 2px;
            flex-shrink: 0;
        }

        /* ── Mini stat cards ── */
        .mini-stat-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 1rem 1.25rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
            flex: 1;
            min-width: 150px;
            position: relative;
            overflow: hidden;
        }

        .mini-stat-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
        }

        .mini-stat-card.accent-max::after {
            background: #211e53;
        }

        .mini-stat-card.accent-low::after {
            background: #6ee7b7;
        }

        .mini-stat-card.accent-avg::after {
            background: #a5b4fc;
        }

        .mini-stat-month {
            font-size: 1.125rem;
            font-weight: 700;
            color: #211e53;
            line-height: 1.3;
        }

        .mini-stat-val {
            font-size: 0.8rem;
            color: #6b7280;
            margin-top: 2px;
            font-variant-numeric: tabular-nums;
        }

        /* ── Detail filter pills ── */
        .detail-filter-btn {
            border: 1px solid #e5e7eb;
            background: #ffffff;
            border-radius: 20px;
            padding: 3px 12px;
            font-size: 11.5px;
            font-weight: 500;
            color: #6b7280;
            cursor: pointer;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
            font-family: 'Sarabun', sans-serif;
        }

        .detail-filter-btn:hover {
            background: #f3f4f6;
            color: #374151;
        }

        .detail-filter-btn.active {
            background: #211e53;
            border-color: #211e53;
            color: #ffffff;
        }

        /* ── Detail filter pills ── */
        .detail-filter-btn {
            border: 1px solid #e5e7eb;
            background: #ffffff;
            border-radius: 20px;
            padding: 3px 12px;
            font-size: 11.5px;
            font-weight: 500;
            color: #6b7280;
            cursor: pointer;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
            font-family: 'Sarabun', sans-serif;
        }

        .detail-filter-btn:hover {
            background: #f3f4f6;
            color: #374151;
        }

        .detail-filter-btn.active {
            background: #211e53;
            border-color: #211e53;
            color: #ffffff;
        }

        /* ── Empty state ── */
        .empty-state {
            text-align: center;
            padding: 2.5rem 1rem;
            color: #9ca3af;
        }

        .empty-state i {
            font-size: 1.75rem;
            color: #d1d5db;
            display: block;
            margin-bottom: 8px;
        }

        .stat-card-year {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-top: 12px;
            background: #eef0fb;
            border: 1px solid #d4d0f0;
            border-radius: 20px;
            padding: 3px 10px;
            font-size: 11px;
            color: #4338ca;
            font-weight: 600;
        }
    </style>
    {{-- ── Page header ── --}}
    <div class="d-flex align-items-start justify-content-between mb-4" style="flex-wrap:wrap;gap:0.75rem;">
        <div>
            <div class="section-label">ค่าใช้จ่ายองค์กร</div>
            <h1 id="name-comp-cost" style="font-size:1.25rem;font-weight:700;color:#111827;margin:0;line-height:1.3;">บริษัท
                ...</h1>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-regular fa-calendar" style="margin-right:5px;color:#9ca3af;"></i>
                ปี {{ session('year') }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                @foreach ($years as $item)
                    <li><a class="dropdown-item" href="/fetch/upa/cost/change/{{ $item->year }}">{{ $item->year }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- ── Summary stat card ── --}}
    <div class="stat-card mb-4">
        <div class="section-label" style="margin-bottom:6px;">รวมค่าใช้จ่าย {{ session('group') }}</div>
        <div id="expenses" class="stat-amount">
            <span class="skeleton skeleton-w80" style="height:2rem;border-radius:8px;display:inline-block;"></span>
        </div>
        <div class="stat-card-year">
            <i class="fa-regular fa-calendar" style="font-size:10px;" aria-hidden="true"></i>
            ปีงบประมาณ {{ session('year') }}
        </div>
        {{-- <div style="font-size:12px;color:#9ca3af;margin-top:4px;">ปีงบประมาณ {{ session('year') }}</div> --}}
    </div>
    {{-- ── Mini stat cards ── --}}
    <div class="d-flex gap-3 mb-4" style="flex-wrap:wrap;">
        <div class="mini-stat-card accent-max">
            <div class="section-label" style="margin-bottom:4px;">เดือนที่จ่ายสูงสุด</div>
            <div id="stat-max-val" class="mini-stat-month">
                <span class="skeleton skeleton-w80" style="height:1rem;border-radius:6px;display:inline-block;"></span>
            </div>
            <div id="stat-max-month" class="mini-stat-val">
                <span class="skeleton skeleton-w40" style="height:0.7rem;border-radius:4px;display:inline-block;"></span>
            </div>
        </div>
        <div class="mini-stat-card accent-low">
            <div class="section-label" style="margin-bottom:4px;">เดือนที่จ่ายน้อยสุด</div>
            <div id="stat-low-val" class="mini-stat-month" style="color:#059669;">
                <span class="skeleton skeleton-w80" style="height:1rem;border-radius:6px;display:inline-block;"></span>
            </div>
            <div id="stat-low-month" class="mini-stat-val">
                <span class="skeleton skeleton-w40" style="height:0.7rem;border-radius:4px;display:inline-block;"></span>
            </div>
        </div>
        <div class="mini-stat-card accent-avg">
            <div class="section-label" style="margin-bottom:4px;">ค่าเฉลี่ยต่อเดือน</div>
            <div id="stat-avg-val" class="mini-stat-month" style="color:#4f46e5;">
                <span class="skeleton skeleton-w80" style="height:1rem;border-radius:6px;display:inline-block;"></span>
            </div>
            <div class="mini-stat-val">เฉลี่ยจากเดือนที่มีข้อมูล</div>
        </div>
    </div>

    {{-- ── Bar Chart card ── --}}
    <div class="table-card mb-4">
        <div class="section-title">ค่าใช้จ่ายรายเดือน</div>
        <div style="padding: 1rem 1.25rem 0.5rem;">
            <div id="chart-monthly">
                <div id="chart-skeleton" style="display:flex;align-items:flex-end;gap:6px;height:200px;padding:0 4px;">
                    @php $skH = [55,70,42,88,65,50,80,38,72,60,48,92]; @endphp
                    @foreach ($skH as $h)
                        <div style="flex:1;height:{{ $h }}%;border-radius:6px 6px 0 0;" class="skeleton"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="table-card mb-4">
        <div class="section-title">สรุปค่าใช้จ่ายรายเดือน</div>
        <div class="head-cost">
            <div class="p-3">
                <div class="table-responsive">
                    <table class="table table-bordered" style="overflow-x: auto;" id="cost-mt">
                        <thead>
                            <tr>
                                <th class="p-0">
                                    <div class="text-center">ม.ค.</div>

                                </th>

                                <th class="p-0">
                                    <div class="text-center">ก.พ.</div>

                                </th>
                                <th class="p-0">
                                    <div class="text-center">มี.ค.</div>

                                </th>
                                <th class="p-0">
                                    <div class="text-center">เม.ย.</div>

                                </th>
                                <th class="p-0">
                                    <div class="text-center">พ.ค.</div>

                                </th>
                                <th class="p-0">
                                    <div class="text-center">มิ.ย.</div>

                                </th>
                                <th class="p-0">
                                    <div class="text-center">ก.ค.</div>

                                </th>
                                <th class="p-0">
                                    <div class="text-center">ส.ค.</div>

                                </th>
                                <th class="p-0">
                                    <div class="text-center">ก.ย.</div>

                                </th>
                                <th class="p-0">
                                    <div class="text-center">ต.ค.</div>

                                </th>
                                <th class="p-0">
                                    <div class="text-center">พ.ย.</div>

                                </th>
                                <th class="p-0">
                                    <div class="text-center">ธ.ค.</div>

                                </th>
                                <th class="p-0" style="background-color:#dcfce7;text-align:center;">รวม</th>
                            </tr>
                        </thead>
                        <tbody id="skeleton-mt">
                            @for ($s = 0; $s < 1; $s++)
                                <tr class="skeleton-row">
                                    @for ($i = 0; $i < 12; $i++)
                                        <td><span class="skeleton skeleton-sm"></span></td>
                                    @endfor
                                    <td><span class="skeleton skeleton-sm skeleton-w80"></span></td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Line Chart card ── --}}
    <div class="table-card mb-4">
        <div class="section-title" style="flex-wrap:wrap;gap:0.5rem;">
            <span>กราฟค่าใช้จ่ายแยกประเภท</span>
            <div id="chart-detail-filters" style="display:flex;flex-wrap:wrap;gap:6px;margin-left:auto;"></div>
        </div>
        <div style="padding: 1rem 1.25rem 0.5rem;">
            <div id="chart-detail">
                <div id="chart-detail-skeleton"
                    style="display:flex;align-items:flex-end;gap:6px;height:200px;padding:0 4px;">
                    @php $skH2 = [45,65,38,80,55,42,72,35,68,50,44,85]; @endphp
                    @foreach ($skH2 as $h)
                        <div style="flex:1;height:{{ $h }}%;border-radius:6px 6px 0 0;" class="skeleton"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="section-title">รายละเอียดค่าใช้จ่าย</div>
        <div class="detail-cost">
            <div class="table-responsive" id="scroll-dt">
                <table class="table table-bordered" style="overflow-x: auto;" id="cost-dt">
                    <thead>
                        <tr>
                            <th class="index sticky-col first-col" style="background-color:#f9fafb;">#</th>
                            <th scope="col" class="sticky-col second-col"
                                style="align-content:center;text-align:center;background-color:#f9fafb;">
                                <div>ประเภทค่าใช้จ่าย</div>
                            </th>

                            <th class="p-0" style="background-color:#f9fafb;">
                                <div class="text-center">ม.ค.</div>
                            </th>
                            <th class="p-0" style="background-color:#f9fafb;">
                                <div class="text-center">ก.พ.</div>
                            </th>
                            <th class="p-0" style="background-color:#f9fafb;">
                                <div class="text-center">มี.ค.</div>
                            </th>
                            <th class="p-0" style="background-color:#f9fafb;">
                                <div class="text-center">เม.ย.</div>
                            </th>
                            <th class="p-0" style="background-color:#f9fafb;">
                                <div class="text-center">พ.ค.</div>
                            </th>
                            <th class="p-0" style="background-color:#f9fafb;">
                                <div class="text-center">มิ.ย.</div>
                            </th>
                            <th class="p-0" style="background-color:#f9fafb;">
                                <div class="text-center">ก.ค.</div>
                            </th>
                            <th class="p-0" style="background-color:#f9fafb;">
                                <div class="text-center">ส.ค.</div>
                            </th>
                            <th class="p-0" style="background-color:#f9fafb;">
                                <div class="text-center">ก.ย.</div>
                            </th>
                            <th class="p-0" style="background-color:#f9fafb;">
                                <div class="text-center">ต.ค.</div>
                            </th>
                            <th class="p-0" style="background-color:#f9fafb;">
                                <div class="text-center">พ.ย.</div>
                            </th>
                            <th class="p-0" style="background-color:#f9fafb;">
                                <div class="text-center">ธ.ค.</div>
                            </th>
                            <th class="p-0" style="background-color:#dcfce7;min-width:100px;">
                                <div class="text-center">รวม</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="skeleton-dt">
                        @for ($s = 0; $s < 8; $s++)
                            <tr class="skeleton-row">
                                <td class="sticky-col first-col"><span class="skeleton skeleton-sm"
                                        style="width:20px;"></span></td>
                                <td class="sticky-col second-col"><span class="skeleton skeleton-sm skeleton-w80"></span>
                                </td>
                                @for ($i = 0; $i < 12; $i++)
                                    <td><span class="skeleton skeleton-sm skeleton-w60"></span></td>
                                @endfor
                                <td><span class="skeleton skeleton-sm skeleton-w80"></span></td>
                            </tr>
                        @endfor
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
            $('#scroll-dt').on('scroll', function() {
                console.log('Table is scrolling'); // ตรวจสอบว่ามีการเลื่อนเกิดขึ้น
                $('.second-col').addClass('bg-scroll');
                $('.first-col').addClass('bg-scroll');
            });
        });

        function fetch_upa_dt() {
            const idComp = '{{ session('idComp') }}';
            const year = '{{ session('year') }}';

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
                                renderLineChart(cost);
                                cost.forEach((item, index) => {
                                    let row = `
                                        <tr class="msgRow" onclick="bgtr(this)">
                                            <td class="sticky-col first-col">${index + 1}.</td>
                                            <td class="sticky-col second-col text-start">${item.nameType || ''}</td>
                                            <td>${formatNumber(item.Md1_1)}</td>
                                            <td>${formatNumber(item.Md2_1)}</td>
                                            <td>${formatNumber(item.Md3_1)}</td>
                                            <td>${formatNumber(item.Md4_1)}</td>
                                            <td>${formatNumber(item.Md5_1)}</td>
                                            <td>${formatNumber(item.Md6_1)}</td>
                                            <td>${formatNumber(item.Md7_1)}</td>
                                            <td>${formatNumber(item.Md8_1)}</td>
                                            <td>${formatNumber(item.Md9_1)}</td>
                                            <td>${formatNumber(item.Md10_1)}</td>
                                            <td>${formatNumber(item.Md11_1)}</td>
                                            <td>${formatNumber(item.Md12_1)}</td>
                                            <td style="background-color:#f0fdf4;">${formatNumber(item.dTotal_1)}</td>
                                        </tr>
                                    `;
                                    setTimeout(function() {
                                        tbody.append(row);
                                    }, index * 75);
                                });
                            } else {
                                tbody.append(
                                    `<tr><td colspan="15"><div class="empty-state"><i class="fa-solid fa-inbox"></i>ไม่มีข้อมูลในปีนี้</div></td></tr>`
                                );
                            }
                        } else {
                            console.error('Expected array but received:', typeof response, response);
                            tbody.append(
                                `<tr><td colspan="15"><div class="empty-state"><i class="fa-solid fa-triangle-exclamation"></i>เกิดข้อผิดพลาดในการโหลดข้อมูล</div></td></tr>`
                            );
                        }
                    } else {
                        console.log('Error:', response.msg);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('There was a problem with your request:', textStatus,
                        errorThrown);
                }
            });
        }

        function fetch_upa_mt() {
            const idComp = '{{ session('idComp') }}';
            //
            const year = '{{ session('year') }}';

            $.ajax({
                type: "get",
                url: `/fetch/upa/cost_mt/${idComp}/${year}`,
                success: function(response) {
                    let tbody = $('#cost-mt tbody');
                    tbody.empty();

                    if (response.status === 'success') {
                        let cost_mt = response.data;
                        const total = response.data.reduce((acc, item) => {
                            return acc + parseFloat(item.Total_1 || 0);
                        }, 0);
                        console.log(response.data);
                        console.log('====================================');
                        console.log(total);
                        console.log('====================================');

                        const compName = response.data.length > 1 ?
                            'เครือ {{ session('group_name') ?? 'ซีดส์กรุป' }}' :
                            response.data[0].CompName;
                        document.getElementById('name-comp-cost').innerText = compName;
                        const topbarEl = document.querySelector('.topbar-title');
                        if (topbarEl) topbarEl.innerText = compName;



                        document.getElementById('expenses').innerText = '฿' + formatNumber(total);


                        if (cost_mt && cost_mt.length > 0) {
                            // Initialize array to store monthly sums
                            let monthlyTotals = new Array(12).fill(0);
                            let grandTotal = 0;

                            // Loop through each company data
                            cost_mt.forEach(company => {
                                let row = '<tr>';
                                for (let i = 1; i <= 12; i++) {
                                    const value1 = company[`M${i}_1`];
                                    if (value1) {
                                        monthlyTotals[i - 1] += parseFloat(value1);
                                    }
                                }
                                grandTotal += parseFloat(company.Total_1);

                                setTimeout(() => {
                                    tbody.append(row);
                                }, 75);
                            });

                            renderBarChart(monthlyTotals);
                            renderMiniStats(monthlyTotals);

                            // Add total row with text cell at the end
                            let totalRow = '<tr>';
                            for (let i = 0; i < 12; i++) {
                                totalRow += `<td>${formatNumber(monthlyTotals[i])}</td>`;
                            }
                            totalRow +=
                                `<td style="background-color:#f0fdf4;">${formatNumber(total)}</td></tr>`;

                            setTimeout(() => {
                                tbody.append(totalRow);
                            }, 100);
                        } else {
                            tbody.append(
                                `<tr><td colspan="13"><div class="empty-state"><i class="fa-solid fa-inbox"></i>ไม่มีข้อมูลในปีนี้</div></td></tr>`
                            );
                        }
                    } else {
                        tbody.append(
                            `<tr><td colspan="13"><div class="empty-state"><i class="fa-solid fa-triangle-exclamation"></i>เกิดข้อผิดพลาด</div></td></tr>`
                        );
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('There was a problem with your request:', textStatus,
                        errorThrown);
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

        function bgtr(element) {
            $('.msgRow').removeClass('tr-active');
            $(element).addClass('tr-active');
        }

        let chartInstance = null;
        let lineChartInstance = null;

        function renderMiniStats(monthlyTotals) {
            const months = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.',
                'ธ.ค.'
            ];
            const nonZero = monthlyTotals.map((v, i) => ({
                v,
                i
            })).filter(x => x.v > 0);
            if (!nonZero.length) return;

            const maxIdx = monthlyTotals.indexOf(Math.max(...monthlyTotals));
            const minEntry = nonZero.reduce((a, b) => a.v < b.v ? a : b);
            const avg = nonZero.reduce((a, b) => a + b.v, 0) / nonZero.length;

            document.getElementById('stat-max-month').innerText = months[maxIdx];
            document.getElementById('stat-max-val').innerText = '฿' + formatNumber(monthlyTotals[maxIdx]);
            document.getElementById('stat-low-month').innerText = months[minEntry.i];
            document.getElementById('stat-low-val').innerText = '฿' + formatNumber(minEntry.v);
            document.getElementById('stat-avg-val').innerText = '฿' + formatNumber(avg);
        }

        let detailCostData = [];
        let activeDetailFilter = '__all__';

        function buildDetailFilters() {
            const container = document.getElementById('chart-detail-filters');
            if (!container) return;
            container.innerHTML = '';

            const allBtn = document.createElement('button');
            allBtn.textContent = 'ทั้งหมด';
            allBtn.className = 'detail-filter-btn active';
            allBtn.dataset.key = '__all__';
            allBtn.onclick = () => setDetailFilter('__all__');
            container.appendChild(allBtn);

            detailCostData.forEach(item => {
                const key = item.nameType || 'ไม่ระบุ';
                const btn = document.createElement('button');
                btn.textContent = key;
                btn.className = 'detail-filter-btn';
                btn.dataset.key = key;
                btn.onclick = () => setDetailFilter(key);
                container.appendChild(btn);
            });
        }

        function setDetailFilter(key) {
            activeDetailFilter = key;
            document.querySelectorAll('.detail-filter-btn').forEach(b => {
                b.classList.toggle('active', b.dataset.key === key);
            });
            updateDetailChart();
        }

        function updateDetailChart() {
            const months = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.',
                'ธ.ค.'
            ];
            let series;

            if (activeDetailFilter === '__all__') {
                // X = เดือน, เส้น = แต่ละประเภทค่าใช้จ่าย
                series = detailCostData.map(item => ({
                    name: item.nameType || 'ไม่ระบุ',
                    data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12].map(n => parseFloat(item['Md' + n + '_1'] ||
                        0))
                }));
            } else {
                // X = เดือน, เส้นเดียว = ประเภทที่เลือก
                const item = detailCostData.find(i => (i.nameType || 'ไม่ระบุ') === activeDetailFilter);
                series = item ? [{
                    name: item.nameType || 'ไม่ระบุ',
                    data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12].map(n => parseFloat(item['Md' + n + '_1'] || 0))
                }] : [];
            }

            if (lineChartInstance) {
                lineChartInstance.updateOptions({
                    series,
                    xaxis: {
                        categories: months
                    }
                });
            }
        }

        function renderLineChart(cost) {
            detailCostData = cost;
            const skEl = document.getElementById('chart-detail-skeleton');
            if (skEl) skEl.remove();
            const months = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.',
                'ธ.ค.'
            ];

            // Default: X = เดือน, เส้น = แต่ละประเภทค่าใช้จ่าย
            const series = cost.map(item => ({
                name: item.nameType || 'ไม่ระบุ',
                data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12].map(n => parseFloat(item['Md' + n + '_1'] || 0))
            }));

            const options = {
                chart: {
                    type: 'line',
                    height: 280,
                    toolbar: {
                        show: false
                    },
                    fontFamily: "'Sarabun', sans-serif",
                    animations: {
                        enabled: true,
                        speed: 600
                    }
                },
                series,
                stroke: {
                    curve: 'smooth',
                    width: 2.5
                },
                markers: {
                    size: 4,
                    hover: {
                        size: 6
                    }
                },
                xaxis: {
                    categories: months,
                    labels: {
                        style: {
                            fontSize: '12px',
                            colors: '#6b7280'
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            fontSize: '11px',
                            colors: '#9ca3af'
                        },
                        formatter: val => val >= 1000000 ?
                            '฿' + (val / 1000000).toFixed(1) + 'M' : val >= 1000 ? '฿' + (val / 1000).toFixed(0) + 'K' :
                            '฿' + val
                    }
                },
                legend: {
                    position: 'top',
                    fontSize: '12px',
                    fontFamily: "'Sarabun', sans-serif",
                    itemMargin: {
                        horizontal: 10
                    }
                },
                grid: {
                    borderColor: '#f3f4f6',
                    strokeDashArray: 4,
                    xaxis: {
                        lines: {
                            show: false
                        }
                    }
                },
                tooltip: {
                    custom: function({
                        series,
                        seriesIndex,
                        dataPointIndex,
                        w
                    }) {
                        const month = w.globals.categoryLabels[dataPointIndex] || w.globals.labels[
                            dataPointIndex] || '';
                        const items = series
                            .map((s, i) => ({
                                name: w.globals.seriesNames[i],
                                value: s[dataPointIndex],
                                color: w.globals.colors[i]
                            }))
                            .filter(i => i.value > 0)
                            .sort((a, b) => b.value - a.value);

                        const rows = items.map(i =>
                            `<div style="display:flex;align-items:center;justify-content:space-between;gap:16px;padding:3px 0;">
                                <div style="display:flex;align-items:center;gap:6px;">
                                    <span style="width:8px;height:8px;border-radius:50%;background:${i.color};flex-shrink:0;"></span>
                                    <span style="color:#6b7280;font-size:11.5px;">${i.name}</span>
                                </div>
                                <span style="font-weight:600;color:#111827;font-size:11.5px;font-variant-numeric:tabular-nums;">฿${parseFloat(i.value).toLocaleString(undefined,{minimumFractionDigits:2,maximumFractionDigits:2})}</span>
                            </div>`
                        ).join('');

                        return `<div style="padding:10px 14px;font-family:'Sarabun',sans-serif;min-width:210px;max-height:320px;overflow-y:auto;">
                            <div style="font-size:11px;font-weight:700;color:#9ca3af;letter-spacing:0.06em;text-transform:uppercase;margin-bottom:6px;">${month}</div>
                            ${rows || '<div style="color:#9ca3af;font-size:11px;">\u0e44\u0e21\u0e48\u0e21\u0e35\u0e02\u0e49\u0e2d\u0e21\u0e39\u0e25</div>'}
                        </div>`;
                    }
                }
            };

            if (lineChartInstance) lineChartInstance.destroy();
            lineChartInstance = new ApexCharts(document.querySelector('#chart-detail'), options);
            lineChartInstance.render();
            buildDetailFilters();
        }

        function renderBarChart(monthlyTotals) {
            const skEl = document.getElementById('chart-skeleton');
            if (skEl) skEl.remove();
            const months = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.',
                'ธ.ค.'
            ];
            const maxVal = Math.max(...monthlyTotals);

            const options = {
                chart: {
                    type: 'bar',
                    height: 240,
                    toolbar: {
                        show: false
                    },
                    fontFamily: "'Sarabun', sans-serif",
                    animations: {
                        enabled: true,
                        speed: 500
                    }
                },
                series: [{
                    name: 'ค่าใช้จ่าย',
                    data: monthlyTotals
                }],
                xaxis: {
                    categories: months,
                    labels: {
                        style: {
                            fontSize: '12px',
                            colors: '#6b7280'
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            fontSize: '11px',
                            colors: '#9ca3af'
                        },
                        formatter: val => val >= 1000000 ?
                            '฿' + (val / 1000000).toFixed(1) + 'M' : val >= 1000 ? '฿' + (val / 1000).toFixed(0) + 'K' :
                            '฿' + val
                    }
                },
                colors: ['#c7c5d8'],
                plotOptions: {
                    bar: {
                        borderRadius: 6,
                        columnWidth: '52%',
                        colors: {
                            ranges: [{
                                from: maxVal,
                                to: maxVal,
                                color: '#211e53'
                            }]
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                },
                grid: {
                    borderColor: '#f3f4f6',
                    strokeDashArray: 4,
                    xaxis: {
                        lines: {
                            show: false
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: val => '฿' + parseFloat(val).toLocaleString(undefined, {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        })
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: 'darken',
                            value: 0.15
                        }
                    }
                }
            };

            if (chartInstance) {
                chartInstance.destroy();
            }
            chartInstance = new ApexCharts(document.querySelector('#chart-monthly'), options);
            chartInstance.render();
        }
    </script>
@endpush
