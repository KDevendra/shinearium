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
    <link rel="stylesheet" href="<?php echo base_url('');?>include/stylesheet/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('');?>include/stylesheet/style.min.css">
    <link rel="stylesheet" href="<?php echo base_url('');?>include/stylesheet/custom.css">
    <style>
    .table-border-0 {
        border: 0 !important;
    }

    body {
        margin-top: 2cm;
        margin-left: 0.1cm;
        margin-right: 0.1cm;
        margin-bottom: 1cm;
    }

    .clear {
        clear: both;
        height: 3cm;
    }

    header {
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 3cm;
    }

    footer {
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 1cm;
        margin-top: 3cm;
    }

	h3{
		background-color: #08C!important;
		color: #fff!important;
		padding: 0.5rem!important;
	}
    </style>
</head>

<body class="zima">
    <header>
        <table border="0px" class="table table-border-0"
            style="table-layout:fixed; margin-bottom: 10px; background-color: transparent !important;">
            <tr class="table-border-0">
                <th width="50%" style="margin-top: 1px !important; padding: 1px !important;"
                    class="text-left table-border-0">
                    <img class="text-left"
                        style="width:250px; padding-bottom: unset !important; margin-bottom: unset !important;"
                        src="<?php echo base_url();?>include/images/Aadona.png" width="468" height="468"
                        alt="product" />
                </th>
                <th width="50%" class="text-right table-border-0">
                    <h1 class="product-title-test"
                        style="padding-bottom: unset !important; margin-bottom: unset !important; background-color: transparent !important;  font-size: 150%;">
                        <?php echo $product_details->title; ?></h1>
                    <ul class="single-info-list"
                        style="padding-bottom: unset !important; margin-bottom: unset !important; background-color: transparent !important;">
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
                </th>
            </tr>
        </table>
    </header>
    <div class="clear"></div>
    <footer>
        <table border="0px" class="table table-border-0" style="table-layout:fixed;">
            <tr style="margin-top:30px;" class="table-border-0">
                <td width="100%" class="justify-content-center text-center table-border-0">
                    <small>© 2020 AADONA Communication Pvt Ltd. All rights reserved</small>
                </td>
            </tr>
        </table>
    </footer>
    <div class="clear"></div>

    <div class="page-wrapper">
        <main class="main">
            <div class="container-fluid">
                <div class="product-single-container product-single-default" style="background-color: transparent;">
                    <div class="row">
                        <div class="col-lg-12 product-single-gallery text-center">
                            <?php /*<div class="d-flex justify-content-center text-center">
                                <img class="product-single-image pt-2 pb-2" style="width:250px;"
                                    src="<?php echo base_url();?>include/images/Aadona.png" width="468" height="468"
                                    alt="product" />
                            </div>*/ ?>
                            <div class="product-slider-container text-center" style="background-color: transparent;">
                                <div class="product-single-details pt-2 pb-1"
                                    style="padding-bottom: unset !important; margin-bottom: unset !important;">
                                    <?php /*<h1 class="product-title-test"
                                        style="padding-bottom: unset !important; margin-bottom: unset !important;">
                                        <?php echo $product_details->title; ?></h1>
                                    <ul class="single-info-list"
                                        style="padding-bottom: unset !important; margin-bottom: unset !important;">
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
                                    </ul>*/ ?>
                                    <p style="padding-bottom: unset !important;">
                                        <?php print_r($product_details->description); ?></p>
                                </div>
                                <div class="d-flex justify-content-center" style="margin-top: unset !important;">
                                    <?php
											$product_images = explode(',',$product_details->images);
											$image_urls = array();
											foreach ($product_images as $img) {
												$img_url = $this->Common_Model->get_file_url($img, 'uploads/products/');
												echo '<img class="product-single-image" src="'.$img_url.'" width="468" height="468" alt="product" style="width: 450px;height: 450px;" />';
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
                        <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                            aria-labelledby="product-tab-desc" style="page-break-before:always;">
                            <h3 class="bg-primary p-2 text-white">OVERVIEW</h3>
                            <div class="product-desc-content">
                                <?php print_r($product_details->overview); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="product-tags-content" role="tabpanel"
                            aria-labelledby="product-tab-tags" style="page-break-before:always;">
                            <h3 class="bg-primary p-2 text-white">FEATURES</h3>
                            <?php print_r($product_details->features); ?>
                        </div>
                        <div class="tab-pane fade show active" id="product-tags-content" role="tabpanel"
                            aria-labelledby="product-tab-tags" style="page-break-before:always;">
                            <h3 class="bg-primary p-2 text-white">SPECIFICATIONS</h3>
                            <?php print_r($product_details->specification); ?>
                        </div>

                    </div>
                </div>

            </div>
        </main>
    </div>
    <div class="clear"></div>
    <table style="page-break-before:always;" border="0px" class="table table-border-0" style="table-layout:fixed;">
        <tr class="table-border-0">
            <td width="100%" colspan="2" class="table-border-0">
                <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            </td>
        </tr>
        <tr class="text-center table-border-0">
            <td width="50%" class="table-border-0">
                <small class="font-weight-bold">Corporate Head Quarter</small><br />
                <small>1st Floor, Phoenix Tech Tower,Plot No.14/46,</small><br />
                <small>IDA-Uppal,Hyderabad,Telangana 500039</small>
            </td>
            <td width="50%" class="table-border-0">
                <small class="font-weight-bold">Production, Warehousing and Billing Center</small><br />
                <small>7, SBI Colony, Mohaba Bazar, Hirapur Road,</small><br />
                <small>Raipur Chhattisgarh 492099</small>
            </td>
        </tr>
        <tr class="text-center table-border-0">
            <td width="50%" class="table-border-0">
                <small class="font-weight-bold"><a href="<?php echo base_url('/');?>">www.aadona.com</a></small><br />
                <br />
                <small>contact@aadona.com </small>
            </td>
            <td width="50%" class="table-border-0">
                <small class="font-weight-bold"><a href="<?php echo base_url('/');?>">www.aadona.com</a></small><br />
                <br />
                <small>contact@aadona.com </small>
            </td>
        </tr>
        <tr class="text-center table-border-0">
            <td width="100%" colspan="2" class="table-border-0">
                <small>AADONA and AADONA logo are trademarks of AADONA Communication Pvt Ltd Printed in India</small>
            </td>
        </tr>
    </table>
    <script src="<?php echo base_url('');?>include/javascript/jquery.min.js"></script>
    <script src="<?php echo base_url('');?>include/javascript/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('');?>include/javascript/optional/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url('');?>include/javascript/plugins.min.js"></script>
    <script src="<?php echo base_url('');?>include/javascript/jquery.appear.min.js"></script>
    <script src="<?php echo base_url('');?>include/javascript/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
</body>

</html>
