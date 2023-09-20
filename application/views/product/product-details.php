<?php include './application/views/common/header.php';?>
<main class="main">
   <section class="page-title" style="background-image: url(<?php echo base_url('');?>include/photos/Top_Banner_3.png);">
      <div class="container">
         <div class="title-outer">
            <h1> <?php echo $sub_category->title; ?></h1>
         </div>
      </div>
   </section>
   <div class="container">
      <div class="horizontal">
         <div class="verticals ten offset-by-one">
            <ol class="breadcrumb breadcrumb-fill0">
               <li><a href="javascript:void(0)" class=""><?php echo $category->title; ?></a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
               <li><a href="<?php echo base_url($sub_category->slug);?>" class=""><span><?php echo $sub_category->title; ?></a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
               <?php
                  if($sub_sub_category){
                  ?>
               <li><a class="" href="<?php echo base_url('product-list/'.$sub_sub_category->slug);?>"><?php echo $sub_sub_category->title; ?></a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
               <?php
                  }
                  ?>
               <li><a id="active" href="javascript:void(0)" ><?php echo $product_details->title;?></a></li>
            </ol>
         </div>
      </div>
   </div>
   <section class="pt-5"   style="background-image: url('<?php echo base_url('');?>include/photos/pattern-1.png');">
      <div class="container">
         <div class="product-single-container product-single-default">
            <div class="row">

               <div class="col-lg-4 col-md-6 product-single-gallery">
                  <div class="product-slider-container">
                     <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                        <?php
                           $product_images = explode(',',$product_details->images);
                           $image_urls = array();
                           foreach ($product_images as $img) {
                           	$img_url = $this->Common_Model->get_file_url($img, 'uploads/products/');
                           	echo '<div class="product-item">';
                           	echo '<img class="product-single-image" src="'.$img_url.'" data-zoom-image="'.$img_url.'" width="500" height="500" alt="product" />';
                           	echo '</div>';
                           }
                           ?>
                     </div>
                     <span class="prod-full-screen">
                     <i class="icon-plus"></i>
                     </span>
                  </div>
                  <div class="prod-thumbnail owl-dots">
                     <?php
                        foreach ($product_images as $img) {
                                                 if(file_exists('uploads/products/thumb/'.$img)){
                                                     $img_url = $this->Common_Model->get_file_url($img, 'uploads/products/thumb/');
                                                 }else{
                                                     $img_url = $this->Common_Model->get_file_url($img, 'uploads/products/');
                                                 }
                        	// $img_url = $this->Common_Model->get_file_url($img, 'uploads/products/');
                        	echo '<div class="owl-dot">';
                        	echo '<img class="product-single-image" src="'.$img_url.'" width="110" height="110" alt="product-thumbnail" />';
                        	echo '</div>';
                        }
                        ?>
                  </div>
               </div>
               <div class="col-lg-8 col-md-6 product-single-details">
                  <h1 class="product-title"><?php echo $product_details->title; ?></h1>
                  <hr class="short-divider">
                  <ul class="single-info-list">
                     <li>
                        <h3>Overview</h3>
                        <strong>
                        <?php
                           if($sub_sub_category){
                           ?>
                        <a href="<?php echo base_url('product-list/'.$sub_sub_category->slug);?>" class="product-category"><?php echo $sub_sub_category->title; ?></a>
                        <?php
                           }
                           ?>
                        <a href="<?php echo base_url($sub_category->slug);?>" class="product-category"><?php echo $sub_category->title; ?></a>
                        <a href="javascript:void()" class="product-category"><?php echo $category->title; ?></a>
                        </strong>
                     </li>
                     <li ><?php print_r($product_details->description); ?></li>
                  </ul>
                  <div class="product-desc" >
                     <?php
                        $word = ". ";
                        $mystring = $product_details->overview;
                        $pos = strpos($mystring, $word)+1;
                          print_r(substr($product_details->overview,0,$pos));
                          if(strlen($product_details->overview) > $pos){
                          	echo '<div id="show_para" class="mb-3">';
                          	print_r(substr($product_details->overview,$pos));
                          	echo '</div> <a id="read_More"><span id="btnsh">Read More<span></a>';
                          }
                          ?>
                            


                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="product-single-tabs ">
            <div class="container-fluid">
               <div id="nav" class="sticky"  style="position:inherit">
                  <ul class="nav nav-tabs" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" id="product-tab-size" data-toggle="tab" href="#product-features" role="tab" aria-controls="product-features" aria-selected="false"><i class="fa fa-check" aria-hidden="true"></i> FEATURES</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-specification" role="tab" aria-controls="product-specification" aria-selected="false"><i class="fa fa-file-o" aria-hidden="true"></i> SPECIFICATIONS</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-downloads" role="tab" aria-controls="product-downloads" aria-selected="false"><i class="fa fa-download" aria-hidden="true"></i> DOWNLOADS</a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="tab-content" >
               <div class="tab-pane fade show active" id="product-features" role="tabpanel" aria-labelledby="product-tab-size">
                  <h4 class="font-weight-bold">Features</h4>
                  <div class="product-desc-content" id="product-features">
                     <?php print_r($product_details->features); ?>
                  </div>
               </div>
               <div class="tab-pane fade" id="product-specification" role="tabpanel" aria-labelledby="product-tab-tags" >
                  <h4 class="font-weight-bold">Specifications</h4>
                  <?php print_r($product_details->specification); ?>
               </div>
               <div class="tab-pane fade show" id="product-downloads" role="tabpanel" aria-labelledby="product-tab-size">
                  <h4 class="font-weight-bold">Downloads</h4>
                  <div class="product-desc-content" id="product-downloads">
                     <?php
                        echo '<span class="font-weight-bold">Datasheet</span><br/>';
                        if($product_details->datasheet_file){
                        	echo '<a href="'.$product_details->datasheet_file_url.'" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> View/Download Datasheet</a>';
                        }else if($product_details->datasheet_url){
                        	echo '<a href="'.$product_details->datasheet_url.'" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> '.$product_details->datasheet_title.'</a>';
                        }else{
                            // echo '<a target="_blank" href="'.base_url('product-pdf/'.$product_details->slug).'" class="btn btn-sm btn-outline-info"><i class="fas fa-file-pdf"></i> View/Download Datasheet</a>';
							echo '<a target="_blank" href="javascript:void(0);" class="btn btn-sm btn-outline-info" onClick="window.open(`'.base_url('product-pdf/'.$product_details->slug).'`).print(); return false;"><i class="fas fa-file-pdf"></i> View/Download Datasheet</a>';
                        	// echo '<span class="text-danger">No datasheet url or file uploaded</span>';
                        }

                        if($product_details->reference_manual_file){
                                              echo '<br/><br/><span class="font-weight-bold">Reference Manual</span><br/>';
                        	echo '<a href="'.$product_details->reference_manual_file_url.'" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> View/Download Reference Manual</a>';
                        }else if($product_details->reference_manual_url){
                                              echo '<br/><br/><span class="font-weight-bold">Reference Manual</span><br/>';
                        	echo '<a href="'.$product_details->reference_manual_url.'" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> '.$product_details->reference_manual_title.'</a>';
                        }
                                          // else{
                        // 	echo '<span class="text-danger">No Reference Manual url or file uploaded</span>';
                        // }
                        if($product_details->quick_installation_guide_file){
                                              echo '<br/><br/><span class="font-weight-bold">Quick Installation Guide</span><br/>';
                        	echo '<a href="'.$product_details->quick_installation_guide_file_url.'" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> View/Download Quick Installation Guide</a>';
                        }else if($product_details->quick_installation_guide_url){
                                              echo '<br/><br/><span class="font-weight-bold">Quick Installation Guide</span><br/>';
                        	echo '<a href="'.$product_details->quick_installation_guide_url.'" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> '.$product_details->quick_installation_guide_title.'</a>';
                        }
                                          // else{
                        // 	echo '<span class="text-danger">No Quick Installation Guide url or file uploaded</span>';
                        // }
                        ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="products-section pt-0 mt-2">
            <h2 class="section-title">
               Related Products
            </h2>
            <div class="products-slider owl-carousel owl-theme dots-top dots-small">
               <?php
                  if(count($related_products) > 0){
                  	foreach ($related_products as $rproduct) {
                  		$rimage_names = explode(',', $rproduct['images']);
                  		$rimage_url = '';
                  		foreach($rimage_names as $rimg)
                  		{
                  			$rimage_url = $this->Common_Model->get_file_url($rimg, 'uploads/products/');
                  			break;
                  		}
                  ?>
               <div class="product-default">
                  <figure>
                     <a href="<?php echo base_url('product/'.$rproduct['slug']);?>">
                     <img src="<?php echo $rimage_url;?>" width="280" alt="<?php echo $rproduct['title']; ?>" height="280" alt="product" />
                     <img src="<?php echo $rimage_url;?>" width="280"  alt="<?php echo $rproduct['title']; ?>" height="280" alt="product" />
                     </a>
                  </figure>
                  <div class="product-details">
                     <h3 class="product-title">
                        <a href="<?php echo base_url('product/'.$rproduct['slug']);?>"><?php echo $rproduct['title']; ?></a>
                     </h3>
                     <div class="product-action">
                        <a href="<?php echo base_url('product/'.$rproduct['slug']);?>" class="btn-icon btn-add-cart">
                        <i class="fa fa-arrow-right"></i>
                        <span>View Now</span>
                        </a>
                     </div>
                  </div>
               </div>
               <?php
                  }
                  }else{
                  ?>
               <div class="col-md-12">
                  <div class="product-default">
                     <div class="product-details">
                        <h3 class="product-title">
                           No more related product(s) found.
                        </h3>
                     </div>
                  </div>
               </div>
               <?php
                  }
                  ?>
            </div>
         </div>
         <hr class="mt-0 m-b-5" />
      </div>
   </section>
</main>
<script>
   $("#show_para").hide();
   $("#show_para").css("margin-top","25px");
   $( "#read_More" ).click(function() {
      $( "#show_para" ).toggle( "slow" );
      $("#btnsh")
       if($("#btnsh").text() == 'Read Less')
       {
           $("#btnsh").text('Read More');
       }
       else
       {
           $("#btnsh").text('Read Less');
       }
   });
</script>
<script type="text/javascript">
   $(document).ready(function() {
   	var stickyNavTop = $('#nav').offset().top;
   	var stickyNav = function(){
   	var scrollTop = $(window).scrollTop();
   if (scrollTop > stickyNavTop) {
   	$('#nav').addClass('sticky');
        $('#nav').css('position','fixed');
   } else {
   	$('#nav').removeClass('sticky');
        $('#nav').css('position','inherit');
   }
   };
   	stickyNav();
   $(window).scroll(function() {
   stickyNav();
   });
   });
</script>
<script type="text/javascript">
   $("#active_tab").parent('.widget-title').css({"background-color":"rgb(255 255 255)","padding":"7px"});

</script>
<?php include './application/views/common/footer.php';?>
