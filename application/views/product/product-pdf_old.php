<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
   	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>
			<?php if($title!=''){ echo $title;} else{ "aadona";}?>
		</title>
		<meta name="keywords" value="<?php if($keywords!=''){ echo $keywords;} else{ " ";}?>">
		<meta name="description" value="<?php if($keywords!=''){ echo $desc;} else{ " ";}?>">
		<meta name="keywords" content="" />
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" type="image/x-icon" href="<?php echo base_url('');?>include/photos/icons/favicon.png">
		<link rel="stylesheet" href="<?php echo base_url('');?>include/stylesheet/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('');?>include/stylesheet/style.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
		<link rel="stylesheet" href="<?php echo base_url('');?>include/stylesheet/demo4.min.css">
		<link rel="stylesheet" href="<?php echo base_url('');?>include/stylesheet/custom.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>include/vendor/fontawesome-free/css/all.min.css">
		<script src="<?php echo base_url('');?>include/stylesheet/font-awesome.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url('');?>include/stylesheet/owl.carousel.min.css">
		<link rel="stylesheet" href="<?php echo base_url('');?>include/stylesheet/owl.theme.default.css">
		<script src="<?php echo base_url('');?>include/javascript/jquery.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   	</head>
   	<body>
		<div class="page-wrapper">
			<main class="main">
				<div class="container">
					<div class="product-single-container product-single-default">
						<div class="row">
							<div class="col-lg-12 product-single-gallery">
								<div class="d-flex justify-content-center">
									<img class="product-single-image pt-2 pb-3" style="width:250px;" src="<?php echo base_url();?>include/images/Aadona.png" width="468" height="468" alt="product" />
								</div>
								<div class="product-slider-container text-center">
									<div class="product-single-details pt-2 pb-2">
										<h1 class="product-title-test"><?php echo $product_details->title; ?></h1>
										<ul class="single-info-list">
											<li>      
												CATEGORY: 
												<strong>
													<?php 
														if($sub_sub_category){
															echo $sub_sub_category->title;
														}
														echo ', '.$sub_category->title;
														echo ', '.$category->title;
													?>
												</strong>
											</li>
										</ul>
										<p><?php print_r($product_details->description); ?></p>
									</div>
									<div class="d-flex justify-content-center">
										<?php
											$product_images = explode(',',$product_details->images);
											$image_urls = array();
											foreach ($product_images as $img) {
												$img_url = $this->Common_Model->get_file_url($img, 'uploads/products/');
												echo '<img class="product-single-image border" src="'.$img_url.'" width="468" height="468" alt="product" style="width: 450px;height: 450px;" />';
												break;
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="product-single-tabs">
						<div class="tab-content">
							<div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
								<h3>OVERVIEW</h3>
								<div class="product-desc-content">
									<?php print_r($product_details->overview); ?>
								</div>
							</div>
							<div class="tab-pane fade show active" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
								<h3>FEATURES</h3>
								<!-- <div class="product-desc-content"> -->
									<?php print_r($product_details->features); ?>
								<!-- </div> -->
							</div>
							<div class="tab-pane fade show active" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
								<h3>SPECIFICATIONS</h3>
								<?php print_r($product_details->specification); ?>
							</div>
						</div>
					</div>
				</div>
			</main>
      	</div>
		<!-- <div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>
      	<div class="mobile-menu-overlay"></div> -->
      	<!-- <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a> -->
		<script src="<?php echo base_url('');?>include/javascript/jquery.min.js"></script>
		<script src="<?php echo base_url('');?>include/javascript/bootstrap.bundle.min.js"></script>
		<script src="<?php echo base_url('');?>include/javascript/optional/isotope.pkgd.min.js"></script>
		<script src="<?php echo base_url('');?>include/javascript/plugins.min.js"></script>
		<script src="<?php echo base_url('');?>include/javascript/jquery.appear.min.js"></script>
		<script src="<?php echo base_url('');?>include/javascript/main.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
   	</body>
</html>
<?php // ob_end_flush(); ?>