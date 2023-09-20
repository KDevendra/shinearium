<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <a href="<?php echo base_url('admin'); ?>" class="brand-link">
   <img src="<?php echo base_url('include/admin/');?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
   <span class="brand-text font-weight-light">Web Flowmechs</span>
   </a>
   <div class="sidebar">
  
    <?php if ($this->session->userdata('user_type') == 'staff')
         {
              ?>
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="<?php echo base_url('admin');?>" class="nav-link <?php if($page_name == 'dashboard') echo 'active'; ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="<?php echo base_url('admin/product');?>" class="nav-link <?php if($page_name == 'product') echo 'active'; ?>">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                     Product
                  </p>
               </a>
            </li>
         </ul>
      </nav>
      <?php
         }
         	else
         	{
         		?>
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="<?php echo base_url('admin');?>" class="nav-link <?php if($page_name == 'dashboard') echo 'active'; ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="<?php echo base_url('admin/category');?>" class="nav-link <?php if($page_name == 'category') echo 'active'; ?>">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                     Category
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="<?php echo base_url('admin/product');?>" class="nav-link <?php if($page_name == 'product') echo 'active'; ?>">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                     Product
                  </p>
               </a>
            </li>
            
         </ul>
      </nav>
      <?php
         }
         		?>
   </div>
</aside>
