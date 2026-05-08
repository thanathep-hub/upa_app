 <style>
     /* ── Sidebar shell ── */
     #sidebar {
         width: 256px;
         min-width: 256px;
         background: #ffffff;
         border-right: 1px solid #e5e7eb;
         display: flex;
         flex-direction: column;
         height: 100vh;
         overflow-y: auto;
         overflow-x: hidden;
         transition: margin-left 0.3s ease-in-out;
         flex-shrink: 0;
     }

     #sidebar::-webkit-scrollbar {
         width: 4px;
     }

     #sidebar::-webkit-scrollbar-thumb {
         background: #d1d5db;
         border-radius: 4px;
     }

     #sidebar.collapsed {
         margin-left: -256px;
     }

     /* ── Sidebar Logo ── */
     .sidebar-logo {
         padding: 1.125rem 1.25rem;
         border-bottom: 1px solid #e2e8f0;
         display: flex;
         align-items: center;
         gap: 0.625rem;
         background: #ffffff;
         border-bottom: 1px solid #f3f4f6;
     }

     .sidebar-logo img {
         background-color: transparent !important;
         filter: none;
         opacity: 1;
     }

     .sidebar-logo-label {
         font-family: 'Sarabun', sans-serif;
         font-size: 0.8125rem;
         font-weight: 700;
         color: #111827;
         line-height: 1.2;
     }

     .sidebar-logo-sub {
         font-size: 0.6875rem;
         color: #9ca3af;
         font-weight: 400;
     }

     /* ── Nav container ── */
     .sidebar-nav {
         flex: 1 1 auto;
         padding: 0.75rem 0.625rem;
     }

     /* ── Section header ── */
     .sidebar-header {
         font-size: 0.6875rem;
         font-weight: 600;
         letter-spacing: 0.09em;
         text-transform: uppercase;
         color: #9ca3af;
         padding: 0.5rem 0.625rem 0.375rem;
         font-family: 'Sarabun', sans-serif;
     }

     /* ── Sidebar links ── */
     a.sidebar-link {
         font-family: 'Sarabun', sans-serif;
         font-weight: 500;
         font-size: 0.875rem;
         padding: 0.575rem 0.75rem;
         display: flex;
         align-items: center;
         gap: 0.625rem;
         color: #374151;
         border-radius: 8px;
         transition: background 0.12s, color 0.12s;
         position: relative;
         white-space: nowrap;
     }

     a.sidebar-link i {
         width: 16px;
         text-align: center;
         font-size: 0.875rem;
         color: #9ca3af;
         flex-shrink: 0;
         transition: color 0.12s;
     }

     a.sidebar-link:hover {
         background-color: #f3f4f6;
         color: #111827;
     }

     a.sidebar-link:hover i {
         color: #374151;
     }

     /* ── Active item ── */
     .sidebar-item.active {
         background: transparent;
         box-shadow: none;
     }

     .sidebar-item.active>a.sidebar-link,
     .sidebar-item.active a.sidebar-link {
         background-color: #eef0fb;
         color: #211e53 !important;
         font-weight: 600;
     }

     .sidebar-item.active>a.sidebar-link i,
     .sidebar-item.active a.sidebar-link i {
         color: #211e53 !important;
     }

     .sidebar-item.active:hover a.sidebar-link {
         background-color: #e0ddf5;
     }

     /* ── Collapse arrow ── */
     .sidebar-link[data-bs-toggle="collapse"]::after {
         border: solid #9ca3af;
         border-width: 0 1.5px 1.5px 0;
         content: "";
         display: inline-block;
         padding: 3px;
         position: absolute;
         right: 0.75rem;
         top: 50%;
         transform: translateY(-60%) rotate(-135deg);
         transition: transform 0.2s ease-out;
     }

     .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
         transform: translateY(-40%) rotate(45deg);
     }

     /* ── Dropdown sub-items ── */
     .sidebar-dropdown {
         padding: 0.25rem 0 0.25rem 0.875rem;
         margin-top: 2px;
         border-left: 2px solid #e5e7eb;
         margin-left: 1.25rem;
     }

     .sidebar-dropdown .sidebar-item a.sidebar-link {
         font-size: 0.8375rem;
         font-weight: 400;
         padding: 0.475rem 0.625rem;
         color: #64748b;
     }

     .sidebar-dropdown .sidebar-item a.sidebar-link:hover {
         background-color: #f3f4f6;
         color: #111827;
     }

     .sidebar-dropdown .sidebar-item.active a.sidebar-link {
         background-color: #eef0fb;
         color: #211e53 !important;
         font-weight: 600;
     }

     .sidebar-dropdown .sidebar-item.active a.sidebar-link i {
         color: #211e53 !important;
     }

     /* ── Border separator ── */
     .sidebar-item-separator {
         border-top: 1px solid #f3f4f6;
         margin: 0.625rem 0.625rem;
     }

     /* ── Logout at bottom ── */
     .sidebar-logout a.sidebar-link {
         color: #6b7280;
         font-size: 0.875rem;
     }

     .sidebar-logout a.sidebar-link i {
         color: #9ca3af;
     }

     .sidebar-logout a.sidebar-link:hover {
         background-color: #fff1f2;
         color: #dc2626;
     }

     .sidebar-logout a.sidebar-link:hover i {
         color: #dc2626;
     }

     /* ── Responsive ── */
     @media (max-width: 768px) {
         #sidebar {
             margin-left: -256px;
         }

         #sidebar.collapsed {
             margin-left: 0;
         }
     }
 </style>
 <!-- Sidebar -->
 <aside id="sidebar" class="sidebar-toggle">
     <div class="sidebar-logo">
         <img src="{{ asset('auth/upa_logo_new.png') }}" style="height: 32px;" alt="UPA">
         <div>
             <div class="sidebar-logo-label">UPA System</div>
             <div class="sidebar-logo-sub">ค่าใช้จ่ายองค์กร</div>
         </div>
     </div>

     <!-- Sidebar Navigation -->
     <ul class="sidebar-nav p-0 m-0">
         <li class="sidebar-header">ค่าใช้จ่าย</li>

         {{-- Seed Group --}}
         <li class="sidebar-item px-2 {{ session('seed-group') === 'true' ? 'active' : '' }}">
             <a href="/set/session/comp/0/0" class="sidebar-link">
                 <i class="fa-solid fa-layer-group"></i>
                 <span>Seed Group</span>
             </a>
         </li>

         {{-- AV Group --}}
         <li class="sidebar-item px-2">
             <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#av-group"
                 aria-expanded="false" aria-controls="av-group">
                 <i class="fa-solid fa-building"></i>
                 <span>AV Group</span>
             </a>
             <ul class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" id="av-group">
             </ul>
         </li>

         {{-- GR Group --}}
         <li class="sidebar-item px-2">
             <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#gr-group"
                 aria-expanded="false" aria-controls="gr-group">
                 <i class="fa-solid fa-building"></i>
                 <span>GR Group</span>
             </a>
             <ul class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" id="gr-group">
             </ul>
         </li>

         {{-- FL Group --}}
         <li class="sidebar-item px-2">
             <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#fl-group"
                 aria-expanded="false" aria-controls="fl-group">
                 <i class="fa-solid fa-building"></i>
                 <span>FL Group</span>
             </a>
             <ul class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" id="fl-group">
             </ul>
         </li>

         {{-- Separator + Logout --}}
         <li class="sidebar-item-separator mt-2"></li>
         <li class="sidebar-item sidebar-logout px-2">
             <a href="/logout" class="sidebar-link">
                 <i class="fa-solid fa-right-from-bracket"></i>
                 <span>ออกจากระบบ</span>
             </a>
         </li>
     </ul>
 </aside>
 <!-- Sidebar Ends -->
 @push('script')
     <script>
         var groupComp = {{ session('GroupSidebar') }};
         var comSelect = @json(session('idComp'));

         //  var groupComp = @json(session('GroupSidebar'));
         //  var comSelect = @json(session('idComp'));

         $(document).ready(function() {

             if (groupComp === 1) {
                 document.getElementById("av-group").classList.add("show");
             }
             if (groupComp === 2) {
                 document.getElementById("gr-group").classList.add("show");
             }
             if (groupComp === 3) {
                 document.getElementById("fl-group").classList.add("show");
             }
             fetch_comp_session();
             const toggler = document.querySelector(".toggler-btn");
             toggler.addEventListener("click", function() {
                 document.querySelector("#sidebar").classList.toggle("collapsed");
             });
         });

         function fetch_comp_session() {
             // AV Group (Group 1)
             $.ajax({
                 type: "get",
                 url: "/fetch/comp_session/1",
                 success: function(response) {
                     if (response.status === 'success') {
                         let comp = response.data;
                         let av = $('#av-group');
                         av.empty();

                         let allCompIds = Array.isArray(comp) ? comp.map(item => item.idcomp).join(',') : '';

                         // เปรียบเทียบแบบง่าย - ไม่สนใจลำดับ
                         let allCompIdsSet = new Set(allCompIds.split(','));
                         let comSelectSet = new Set(comSelect.toString().split(','));
                         let isAllCompaniesSelected = allCompIdsSet.size === comSelectSet.size && [...
                             allCompIdsSet
                         ].every(id => comSelectSet.has(id));

                         let all = `
                    <li class="sidebar-item px-2 ${isAllCompaniesSelected ? 'active' : ''}">
                        <a href="/set/session/comp/1/${allCompIds}" class="sidebar-link">ทุกบริษัท</a>
                    </li>
                `;

                         setTimeout(function() {
                             av.append(all);
                         }, 0);

                         if (Array.isArray(comp)) {
                             if (comp.length > 0) {
                                 comp.forEach((item, index) => {
                                     // แปลงเป็น string เพื่อเปรียบเทียบ
                                     let selected = !isAllCompaniesSelected && comSelectSet.has(item
                                         .idcomp.toString());

                                     let row = `
                                <li class="sidebar-item px-2 ${selected ? 'active' : ''}">
                                    <a href="/set/session/comp/1/${item.idcomp}" class="sidebar-link">${item.CompName || ''}</a>
                                </li>
                            `;
                                     setTimeout(function() {
                                         av.append(row);
                                     }, (index + 1) * 50);
                                 });
                             }
                         }
                     }
                 },
                 error: function(xhr, status, error) {
                     console.error('AV Group AJAX Error:', error);
                 }
             });

             // GR Group (Group 2)
             $.ajax({
                 type: "get",
                 url: "/fetch/comp_session/2",
                 success: function(response) {
                     if (response.status === 'success') {
                         let comp = response.data;
                         let gr = $('#gr-group');
                         gr.empty();

                         let allCompIds = Array.isArray(comp) ? comp.map(item => item.idcomp).join(',') : '';

                         // เปรียบเทียบแบบง่าย - ไม่สนใจลำดับ
                         let allCompIdsSet = new Set(allCompIds.split(','));
                         let comSelectSet = new Set(comSelect.toString().split(','));
                         let isAllCompaniesSelected = allCompIdsSet.size === comSelectSet.size && [...
                             allCompIdsSet
                         ].every(id => comSelectSet.has(id));

                         let all = `
                    <li class="sidebar-item px-2 ${isAllCompaniesSelected ? 'active' : ''}">
                        <a href="/set/session/comp/2/${allCompIds}" class="sidebar-link">ทุกบริษัท</a>
                    </li>
                `;

                         setTimeout(function() {
                             gr.append(all);
                         }, 0);

                         if (Array.isArray(comp)) {
                             if (comp.length > 0) {
                                 comp.forEach((item, index) => {
                                     // แปลงเป็น string เพื่อเปรียบเทียบ
                                     let selected = !isAllCompaniesSelected && comSelectSet.has(item
                                         .idcomp.toString());

                                     let row = `
                                <li class="sidebar-item px-2 ${selected ? 'active' : ''}">
                                    <a href="/set/session/comp/2/${item.idcomp}" class="sidebar-link">${item.CompName || ''}</a>
                                </li>
                            `;

                                     setTimeout(function() {
                                         gr.append(row);
                                     }, (index + 1) * 50);
                                 });
                             }
                         }
                     }
                 },
                 error: function(xhr, status, error) {
                     console.error('GR Group AJAX Error:', error);
                 }
             });

             // FL Group (Group 3)
             $.ajax({
                 type: "get",
                 url: "/fetch/comp_session/3",
                 success: function(response) {
                     if (response.status === 'success') {
                         let comp = response.data;
                         let fl = $('#fl-group');
                         fl.empty();

                         let allCompIds = Array.isArray(comp) ? comp.map(item => item.idcomp).join(',') : '';

                         // เปรียบเทียบแบบง่าย - ไม่สนใจลำดับ
                         let allCompIdsSet = new Set(allCompIds.split(','));
                         let comSelectSet = new Set(comSelect.toString().split(','));
                         let isAllCompaniesSelected = allCompIdsSet.size === comSelectSet.size && [...
                             allCompIdsSet
                         ].every(id => comSelectSet.has(id));

                         let all = `
                    <li class="sidebar-item px-2 ${isAllCompaniesSelected ? 'active' : ''}">
                        <a href="/set/session/comp/3/${allCompIds}" class="sidebar-link">ทุกบริษัท</a>
                    </li>
                `;

                         setTimeout(function() {
                             fl.append(all);
                         }, 0);

                         if (Array.isArray(comp)) {
                             if (comp.length > 0) {
                                 comp.forEach((item, index) => {
                                     // แปลงเป็น string เพื่อเปรียบเทียบ
                                     let selected = !isAllCompaniesSelected && comSelectSet.has(item
                                         .idcomp.toString());

                                     let row = `
                                <li class="sidebar-item px-2 ${selected ? 'active' : ''}">
                                    <a href="/set/session/comp/3/${item.idcomp}" class="sidebar-link">${item.CompName || ''}</a>
                                </li>
                            `;

                                     setTimeout(function() {
                                         fl.append(row);
                                     }, (index + 1) * 50);
                                 });
                             }
                         }
                     }
                 },
                 error: function(xhr, status, error) {
                     console.error('FL Group AJAX Error:', error);
                 }
             });
         }
     </script>
 @endpush
