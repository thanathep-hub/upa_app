 <style>
     #sidebar {
         max-width: 264px;
         min-width: 264px;
         transition: all 0.35s ease-in-out;
         background-color: #f8f8f8;
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
         color: #808080;
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
 </style>
 <!-- Sidebar -->
 <aside id="sidebar" class="sidebar-toggle">
     <div class="sidebar-logo">
         <img src="{{ asset('auth/logo-upa.png') }}" style="height: 48px;">
     </div>
     <!-- Sidebar Navigation -->
     <ul class="sidebar-nav p-0">
         {{-- <li class="sidebar-header">
                    Tools & Components
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Task</span>
                    </a>
                </li> --}}
         <li class="sidebar-header">
             ค่าใช้จ่าย
         </li>
         <li class="sidebar-item">
             <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                 data-bs-target="#auth" aria-expanded="true" aria-controls="auth">
                 <i class="fa-solid fa-building"></i>
                 <span>บริษัท</span>
             </a>
             <ul id="auth" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
                 <li class="sidebar-item m-2" style="background-color: #6dd7ff;border-radius:12px;">
                     <a href="#" class="sidebar-link active" style="color: #fff;">GR</a>
                 </li>
             </ul>
         </li>
         {{-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li> --}}
         {{-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                    </a>
                </li> --}}
     </ul>
     <!-- Sidebar Navigation Ends -->
     <div class="sidebar-footer">
         <a href="#" class="sidebar-link">
             <i class="fa-solid fa-right-from-bracket fa-flip-horizontal pe-2"></i>
             ออกจากระบบ
         </a>
     </div>
 </aside>
 <!-- Sidebar Ends -->
 <script>
     const toggler = document.querySelector(".toggler-btn");
     toggler.addEventListener("click", function() {
         document.querySelector("#sidebar").classList.toggle("collapsed");
     });
 </script>
