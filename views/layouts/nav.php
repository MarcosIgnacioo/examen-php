 <!-- [ Header Topbar ] start -->
 <header class="pc-header">
   <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
     <div class="me-auto pc-mob-drp">
       <ul class="list-unstyled">
         <!-- ======= Menu collapse Icon ===== -->
         <li class="pc-h-item pc-sidebar-collapse">
           <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
             <i class="ti ti-menu-2"></i>
           </a>
         </li>
         <li class="pc-h-item pc-sidebar-popup">
           <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
             <i class="ti ti-menu-2"></i>
           </a>
         </li>


       </ul>
     </div>
     <!-- [Mobile Media Block end] -->
     <div class="ms-auto">
       <ul class="list-unstyled">

         <li class="dropdown pc-h-item">
           <a
             class="pc-head-link dropdown-toggle arrow-none me-0"
             data-bs-toggle="dropdown"
             href="#"
             role="button"
             aria-haspopup="false"
             aria-expanded="false">
             <i class="ph-duotone ph-sun-dim"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
             <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
               <i class="ph-duotone ph-moon"></i>
               <span>Dark</span>
             </a>
             <a href="#!" class="dropdown-item" onclick="layout_change('light')">
               <i class="ph-duotone ph-sun-dim"></i>
               <span>Light</span>
             </a>
             <a href="#!" class="dropdown-item" onclick="layout_change_default()">
               <i class="ph-duotone ph-cpu"></i>
               <span>Default</span>
             </a>
           </div>
         </li>

         <li class="list-group-item">
           <form method="POST" action="<?= BASE_PATH ?>/api-auth">
             <input type="hidden" name="action" value="logout">
             <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
             <button type="submit" class="dropdown-item">
               <span class="d-flex align-items-center">
                 <i class="ph-duotone ph-power"></i>
                 <span>Logout</span>
                 </a>
           </form>
         </li>
       </ul>
     </div>
   </div>
   </div>
   </li>
   </ul>
   </div>
   </div>
 </header>
 <!-- [ Header ] end -->
