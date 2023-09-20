<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Product(s)</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/admin'); ?>">Dashboard</a></li>
               <li class="breadcrumb-item active">Product List</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <?php if ($this->session->flashdata('success')) { ?>
            <div class="card-body">
               <div class="alert alert-success alert-dismissible show" role="alert">
                  <?php echo $this->session->flashdata('success') ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            </div>
            <?php } ?>
            <?php if ($this->session->flashdata('error')) { ?>
            <div class="card-body">
               <div class="alert alert-danger alert-dismissible show" role="alert">
                  <?php echo $this->session->flashdata('error') ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            </div>
            <?php } ?>	
            <div class="card">
               <div class="card-body">
                  <a href="<?php echo base_url('admin/product/add'); ?>" type="button" class="btn bg-gradient-success btn-sm">Add New Product</a>
                  <?php /*<a href="<?php echo base_url('uploads/upload_file_formats'); ?>/SerialNumberFileFormat.csv" type="button" class="btn bg-gradient-info btn-sm">Download Excel Format File</a>
                  <a href="<?php echo base_url('admin/product/upload'); ?>" type="button" class="btn bg-gradient-primary btn-sm">Upload Excel File</a>*/ ?>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Product List</h3>
               </div>
               <div class="card-body">
                  <table class="table table-bordered table-striped table-hover data_list">
                     <thead>
                        <tr>
                           <th>SNo</th>
                           <th>Title</th>
                           <th>Category</th>
                           <?php /*<th>Serial Number</th>*/ ?>
                           <th>Image</th>
                           <th>Created At</th>
                           <th>Active Status</th>
                           <th>Display In Order</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           if(count($list) > 0){
                           	/*<td>'.$row['serial_number'].'</td>*/
                           	$index = 0;
                           	foreach($list as $row){
                           		$p_img = 'Image not uploaded!';
                           		if($row['image']){
                           			$p_img = '<img src="'.$row['image'].'" class="rounded shadow m-2" alt="'.$row['title'].'" width="50" />';
                           		}
                           		$active_status = '<span class="badge badge-danger">Inactive</span>';
                           		$active_button = '<i class="fas fa-check text-success"></i> Mark As Active';
                           		if($row['active_status'] == 'active'){
                           			$active_status = '<span class="badge badge-success">Active</span>';
                           			$active_button = '<i class="fas fa-ban text-danger"></i> Mark As Inactive';
                           		}
                           		$index += 1;
                           		echo '<tr>
                           				<td>'.$index.'</td>
                           				<td>'.$row['title'].'</td>
                           				<td>'.$row['category'].'</td>
                           				<td>'.$p_img.'</td>
                           				<td>'.$row['created_at'].'</td>
                           				<td>'.$active_status.'</td>
                           				<td class="text-center"><span class="badge badge-info p-2">'.$row['order_by'].'</span></td>
                           				<td>
                           					<a class="btn btn-sm" href="'.base_url('admin/product/edit/').$row['product_id'].'"> 
                           						<i class="fas fa-edit text-success"></i> 
                           						Edit
                           					</a>
                           					<a class="btn btn-sm" href="'.base_url('admin/product/view/').$row['product_id'].'">
                           						<i class="fas fa-info text-primary"></i> 
                           						View
                           					</a>
                           				
                           					<a class="btn btn-sm" href="'.base_url('product/delete/').$row['product_id'].'"><i class="fas fa-trash-alt text-danger"></i> Delete</a>
                           					<a class="btn btn-sm btn-active-status" href="javascript:void(0);" data-id="'.$row['product_id'].'" data-status="'.$row['active_status'].'">
                           						'.$active_button.'
                           					</a>
                           				</td>
                           			</tr>';
                           	}
                           }else{
                           	echo '<tr><td colspan="6" class="text-center">No matching record(s) found.</td></tr>';
                           }
                           ?>					
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>SNo</th>
                           <th>Title</th>
                           <th>Category</th>
                           <?php /*<th>Serial Number</th>*/ ?>
                           <th>Image</th>
                           <th>Created At</th>
                           <th>Active Status</th>
                           <th>Display In Order</th>
                           <th>Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>