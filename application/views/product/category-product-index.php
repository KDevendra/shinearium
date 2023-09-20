

<?php include 'common/header.php';?>
<main class="main">
   <div class="container">
      <nav aria-label="breadcrumb" class="breadcrumb-nav">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('');?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo $parent_category->title; ?></a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo $category_details->title; ?></a></li>
         </ol>
      </nav>
      <div class="row mb-lg-3">
			<?php if(count($child_category) > 0){ ?>
         <div class="col-lg-3" >
            <div class="sidebar-wrapper" id="custom-sidebar-wrapper">
               <ul class="widget widget-product-categories mb-3">
						<?php
							if(count($child_category) > 0){
								foreach ($child_category as $child) {
									echo '<li>';
									echo '<h3 class="widget-title">';
									echo '<a href="'.base_url('product-list/'.$child['slug']).'">'.$child['title'].'</a>';
									echo '</h3>';
									echo '</li>';
								}
							}
						?>
                  <?php /*<li>
                     <h3 class="widget-title">
                        <a  href="<?php echo base_url('SMB-Indoor-IP');?>" id="active_tab" >SMB Indoor IP</a>
                     </h3>
                  </li>
                  <li>
                     <h3 class="widget-title">
                        <a  href="#">SMB Outdoor Bullet</a>
                     </h3>
                  </li>
                  <li>
                     <h3 class="widget-title">
                        <a  href="#">SMB NVR</a>
                     </h3>
                  </li>
                  <li>
                     <h3 class="widget-title">
                        <a href="#" >Surveillance PoE Switches</a>
                     </h3>
                  </li>
                  <li>
                     <h3 class="widget-title">
                        <a  href="#" >The Sixth Sense</a>
                     </h3>
                  </li>*/ ?>
               </ul>
            </div>
         </div>
			<?php } ?>
         <div class="<?php if(count($child_category) > 0){  echo 'col-lg-9';  }else { echo 'col-lg-12'; } ?> mb-lg-0">
            <div class="row row-sm">
               <div class="col-md-4">
                  <div class="product-default">
                     <figure>
                        <a href="<?php echo base_url('orion-ofl-3t');?>">
                        <img src="<?php echo base_url('');?>include/photos/surveillance/Orion_ofl_3t.png" width="280" alt="ORION : OFL-3T" height="280" alt="product" />
                        <img src="<?php echo base_url('');?>include/photos/surveillance/Orion_ofl_3t.png" width="280"  alt="ORION : OFL-3T" height="280" alt="product" />
                        </a>
                     </figure>
                     <div class="product-details">
                        <h3 class="product-title"> <a  href="<?php echo base_url('orion-ofl-3t');?>">ORION : OFL-3T</a>
                        </h3>
                        <div class="product-action">
                           <a  href="<?php echo base_url('orion-ofl-3t');?>" class="btn-icon btn-add-cart"><i
                              class="fa fa-arrow-right"></i><span>View Now</span></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="product-default">
                     <figure>
                        <a href="#">
                        <img src="<?php echo base_url('');?>include/photos/surveillance/Orion_Ofl_3vd_m.png" width="280" alt="ORION : OFL-3VD-M" height="280" alt="product" />
                        <img src="<?php echo base_url('');?>include/photos/surveillance/Orion_Ofl_3vd_m.png" width="280"  alt="ORION : OFL-3VD-M" height="280" alt="product" />
                        </a>
                     </figure>
                     <div class="product-details">
                        <h3 class="product-title"> <a  href="#">ORION : OFL-3VD-M</a>
                        </h3>
                        <div class="product-action">
                           <a href="#" class="btn-icon btn-add-cart"><i
                              class="fa fa-arrow-right"></i><span>View Now</span></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="product-default">
                     <figure>
                        <a href="#">
                        <img src="<?php echo base_url('');?>include/photos/surveillance/Orion_Ofl_5vd_m.png" width="280" alt="ORION : OFL-5VD-M" height="280" alt="product" />
                        <img src="<?php echo base_url('');?>include/photos/surveillance/Orion_Ofl_5vd_m.png" width="280"  alt="ORION : OFL-5VD-M" height="280" alt="product" />
                        </a>
                     </figure>
                     <div class="product-details">
                        <h3 class="product-title"> <a href="#">ORION : OFL-5VD-M</a>
                        </h3>
                        <div class="product-action">
                           <a href="#" class="btn-icon btn-add-cart"><i
                              class="fa fa-arrow-right"></i><span>View Now</span></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="product-default">
                     <figure>
                        <a href="#">
                        <img src="<?php echo base_url('');?>include/photos/surveillance/Orion_Ofl_5t.png" width="280" alt="ORION : OFL-5T" height="280" alt="product" />
                        <img src="<?php echo base_url('');?>include/photos/surveillance/Orion_Ofl_5t.png" width="280"  alt="ORION : OFL-5T" height="280" alt="product" />
                        </a>
                     </figure>
                     <div class="product-details">
                        <h3 class="product-title"> <a href="#">ORION : OFL-5T</a>
                        </h3>
                        <div class="product-action">
                           <a href="#" class="btn-icon btn-add-cart"><i
                              class="fa fa-arrow-right"></i><span>View Now</span></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
</main>
<?php include 'common/footer.php';?>
