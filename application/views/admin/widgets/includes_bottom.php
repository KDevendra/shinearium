<!-- jQuery -->
<script src="<?php echo base_url('include/admin/');?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('include/admin/');?>plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
   $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('include/admin/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('include/admin/');?>plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url('include/admin/');?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url('include/admin/');?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url('include/admin/');?>plugins/jquery-validation/additional-methods.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('include/admin/');?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('include/admin/');?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('include/admin/');?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url('include/admin/');?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('include/admin/');?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('include/admin/');?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url('include/admin/');?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('include/admin/');?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('include/admin/');?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- dropzonejs -->
<?php /*
   <script src="<?php echo base_url('include/admin/');?>plugins/dropzone/min/dropzone.min.js"></script>
*/ ?>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('include/admin/');?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url('include/admin/');?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('include/admin/');?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<?php /*
   <script src="<?php echo base_url('include/admin/');?>dist/js/pages/dashboard.js"></script>
*/ ?>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('include/admin/');?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('include/admin/');?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('include/admin/');?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('include/admin/');?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('include/admin/');?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('include/admin/');?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('include/admin/');?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('include/admin/');?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('include/admin/');?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('include/admin/');?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('include/admin/');?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('include/admin/');?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
   var BASE_URL = "<?php echo base_url('admin'); ?>";
   $(function () {
   	// Initialize datatable
   	$(".data_list").DataTable({
   		"responsive": true, "lengthChange": false, "autoWidth": false,
   		"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
   	}).buttons().container().appendTo('.dataTables_wrapper .col-md-6:eq(0)');
   	// $('.data_list').DataTable({
   	// 	"paging": true,
   	// 	"lengthChange": false,
   	// 	"searching": false,
   	// 	"ordering": true,
   	// 	"info": true,
   	// 	"autoWidth": false,
   	// 	"responsive": true,
   	// });

   	//Initialize Select2 Elements
   	$('.select2').select2();

   	// Initialize summer notes elements
   	$('.summernote').summernote({
   		minHeight: 100,
   		maxHeight: 300,
   	});

   	// Initialize custom file input
   	bsCustomFileInput.init();
   });
   // $("#staffForm").submit(function() {
   // 	$.ajax({
   //
   // 			url : '<?php echo base_url('staff-submit');?>',
   // 			type : 'post',
   //      processData : false,
   //      contentType : false,
   //      cache :false,
   //      async : false,
   //      data : new FormData(this),
   //      beforeSend:function () {
   //        alert("Please wait");
   //      },
   //      success:function (data)
   //      {
   //        if (data == 1)
   //        {
   //          // alert(data);
   //          console.log(data);
   //        }
   //      },
   //      error:function() {
   //        alert("error");
   //      },
   // 		});
   // });

   var el_down = document.getElementById("user_password");
        function generateP() {
            var pass = '';
            var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' +
                    'abcdefghijklmnopqrstuvwxyz0123456789@#$';

            for (let i = 1; i <= 8; i++) {
                var char = Math.floor(Math.random()
                            * str.length + 1);

                pass += str.charAt(char)
            }

            return pass;
        }

        function gfg_Run() {

            document.getElementById("user_password").value = generateP();
        }

</script>
<?php if(isset($js_page_name) && $js_page_name != null){
   echo '<script src="'.base_url('include/admin/custom-js/').$js_page_name.'.js"></script>';
   }?>
<?php
   if(isset($image_crop_css) && $image_crop_css == 'yes'){
   	echo '<script src="'.base_url('include/admin/').'plugins/image-cropper/cropper.min.js"></script>';
   }
   ?>
</body>
</html>
