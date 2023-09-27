<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shinearium - <?php echo $page_name; ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('include/admin/');?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('include/admin/');?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('include/admin/');?>plugins/select2/css/select2.min.css">
	<!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('include/admin/');?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('include/admin/');?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('include/admin/');?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('include/admin/');?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('include/admin/');?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('include/admin/');?>plugins/summernote/summernote-bs4.min.css">
	<!-- dropzonejs -->
  <link rel="stylesheet" href="<?php echo base_url('include/admin/');?>plugins/dropzone/min/dropzone.min.css">
	<!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('include/admin/');?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('include/admin/');?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('include/admin/');?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  	<?php
		if(isset($image_crop_css) && $image_crop_css == 'yes'){
			echo '<link rel="stylesheet" href="'.base_url('include/admin/').'plugins/image-cropper/cropper.min.css">';
		}  	
	?>
</head>
<?php
	$class = "sidebar-mini layout-fixed";
	if($page_name == 'login'){
		$class = "login-page";
	}
?>
<body class="hold-transition <?php echo $class; ?>">
