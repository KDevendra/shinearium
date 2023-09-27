<?php include_once 'widgets/includes_top.php'; ?>
<div class="wrapper">
   <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?php echo base_url('include/admin/');?>dist/img/AdminLTELogo.png" alt="Shinearium" height="60" width="60">
   </div>
   <?php include_once 'widgets/top_navbar.php'; ?>
   <?php include 'widgets/sidebar.php'; ?>
   <div class="content-wrapper">
      <?php include 'pages/'.$page_name.'.php'; ?>
   </div>
   <?php include_once 'widgets/footer.php'; ?>
</div>
<?php include_once 'widgets/includes_bottom.php'; ?>