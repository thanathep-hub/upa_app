 <style>
     #sidebar {
         max-width: 264px;
         min-width: 264px;
         transition: all 0.35s ease-in-out;
         /* background-color: #f8f8f9; */
         background-color: #cbd5e1;
         display: flex;
         flex-direction: column;
     }

     #sidebar.collapsed {
         margin-left: -264px;
     }

     .toggler-btn {
         background-color: transparent;
         cursor: pointer;
         border: 0;
     }

     .toggler-btn i {
         font-size: 1.75rem;
         /* color: #808080; */
         color: #111827;
         font-weight: 1000;
     }

     .navbar {
         padding: 1.15rem 1.5rem;
         border-bottom: 1px solid gainsboro;
     }

     .sidebar-nav {
         flex: 1 1 auto;
     }

     .sidebar-logo {
         padding: 1rem 1rem;
         text-align: center;
     }

     .sidebar-logo a {
         font-weight: 800;
         font-size: 1.5rem;
     }

     .sidebar-header {
         font-size: .75rem;
         padding: 1.5rem 1.5rem .375rem;
     }

     a.sidebar-link {
         font-weight: 700;
         padding: .625rem 1.625rem;
         position: relative;
         transition: all 0.35s;
         display: block;
         font-size: 1rem;
         color: #111827;
     }

     a.sidebar-link:hover {
         background-color: #f9f6f630;
     }

     .sidebar-link[data-bs-toggle="collapse"]::after {
         border: solid;
         border-width: 0 .075rem .075rem 0;
         content: "";
         display: inline-block;
         padding: 2px;
         position: absolute;
         right: 1.5rem;
         top: 1.4rem;
         transform: rotate(-135deg);
         transition: all .2s ease-out;
     }

     .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
         transform: rotate(45deg);
         transition: all .2s ease-out;
     }

     /* Screen size less than 768px */

     @media (max-width:768px) {

         .sidebar-toggle {
             margin-left: -264px;
         }

         #sidebar.collapsed {
             margin-left: 0;
         }
     }

     a.sidebar-link:hover {
         background-color: #ffffff;
         color: #111827 !important;
         border-radius: 12px;
     }

     .active {
         box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
         /* box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; */
         background-color: #111827;

         a.sidebar-link {
             color: #fff;
         }
     }

     .active:hover {
         background-color: #6b7280;
     }
 </style>
 <!-- Sidebar -->
 <aside id="sidebar" class="sidebar-toggle">
     <div class="sidebar-logo">
         <img src="{{ asset('auth/logo-upa.png') }}" style="height: 48px;">
     </div>
     <!-- Sidebar Navigation -->
     <ul class="sidebar-nav p-0">
         <li class="sidebar-header">
             <span style="font-size: 12px;">ค่าใช้จ่าย</span>

         </li>
         <li class="sidebar-item">
             <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                 data-bs-target="#av-group" aria-expanded="true" aria-controls="av-group">
                 <i class="fa-solid fa-building pe-2"></i>
                 <span>AV Group</span>
             </a>
             <ul class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" id="av-group">
             </ul>
         </li>
         <li class="sidebar-item">
             <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                 data-bs-target="#gr-group" aria-expanded="true" aria-controls="gr-group">
                 <i class="fa-solid fa-building pe-2"></i>
                 <span>GR Group</span>
             </a>
             <ul class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" id="gr-group">
             </ul>
         </li>
         <li class="sidebar-item">
             <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                 data-bs-target="#fl-group" aria-expanded="true" aria-controls="fl-group">
                 <i class="fa-solid fa-building pe-2"></i>
                 <span>FL Group</span>
             </a>
             <ul class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" id="fl-group">
             </ul>
         </li>
     </ul>
     <!-- Sidebar Navigation Ends -->
     <div class="sidebar-footer">
         <a href="/logout" class="sidebar-link">
             <i class="fa-solid fa-right-from-bracket fa-flip-horizontal pe-2"></i>
             ออกจากระบบ
         </a>
     </div>
 </aside>
 <!-- Sidebar Ends -->
 @push('script')
     <script>
         var groupComp = {{ session('GroupSidebar') }};


         var comSelect = {{ session('idComp') }};
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
             $.ajax({
                 type: "get",
                 url: "/fetch/comp_session/1",
                 success: function(response) {
                     if (response.status === 'success') {
                         let comp = response.data;
                         let av = $('#av-group');
                         av.empty();

                         if (Array.isArray(comp)) {
                             if (comp.length > 0) {
                                 comp.forEach((item, index) => {
                                     let row = `
                                        <li class="sidebar-item m-2 ${item.idcomp == comSelect ? 'active' : ''}" style="border-radius:12px;">
                                            <a href="/set/session/comp/1/${item.idcomp}" class="sidebar-link">${item.CompName || ''}</a>
                                        </li>
                                    `;
                                     setTimeout(function() {
                                         av.append(row);
                                     }, index * 50);
                                 });
                             } else {
                                 av.append(``);
                             }
                         }
                     }
                 }
             });

             $.ajax({
                 type: "get",
                 url: "/fetch/comp_session/2",
                 success: function(response) {
                     if (response.status === 'success') {
                         let comp = response.data;
                         let gr = $('#gr-group');
                         gr.empty();

                         if (Array.isArray(comp)) {
                             if (comp.length > 0) {
                                 comp.forEach((item, index) => {
                                     let row = `
                                        <li class="sidebar-item m-2 ${item.idcomp == comSelect ? 'active' : ''}" style="border-radius:12px;">
                                            <a href="/set/session/comp/2/${item.idcomp}" class="sidebar-link">${item.CompName || ''}</a>
                                        </li>
                                    `;
                                     setTimeout(function() {
                                         gr.append(row);
                                     }, index * 50);
                                 });
                             } else {
                                 gr.append(``);
                             }
                         }
                     }
                 }
             });

             $.ajax({
                 type: "get",
                 url: "/fetch/comp_session/3",
                 success: function(response) {
                     if (response.status === 'success') {
                         let comp = response.data;
                         let fl = $('#fl-group');
                         fl.empty();

                         if (Array.isArray(comp)) {
                             if (comp.length > 0) {
                                 comp.forEach((item, index) => {
                                     let row = `
                                        <li class="sidebar-item m-2 ${item.idcomp == comSelect ? 'active' : ''}" style="border-radius:12px;">
                                            <a href="/set/session/comp/3/${item.idcomp}" class="sidebar-link">${item.CompName || ''}</a>
                                        </li>
                                    `;
                                     setTimeout(function() {
                                         fl.append(row);
                                     }, index * 50);
                                 });
                             } else {
                                 fl.append(``);
                             }
                         }
                     }
                 }
             });
         }
     </script>
 @endpush
