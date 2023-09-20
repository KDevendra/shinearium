<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Categories</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/admin'); ?>">Dashboard</a></li>
               <li class="breadcrumb-item active">Category List</li>
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
                  <a href="<?php echo base_url('admin/category/add'); ?>" type="button" class="btn bg-gradient-success btn-sm">Add New</a>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Category List</h3>
               </div>
               <div class="card-body">
                  <table class="table table-bordered table-striped table-hover data_list">
                     <thead>
                        <tr>
                           <th>Category</th>
                           <th>Parent Categories</th>
                           <th>Category Thumbnail</th>
                           <th>Created At</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           if(count($list) > 0){
                           	foreach($list as $row){
                           		echo '<tr>
                           				<td>'.$row['title'].'</td>
                           				<td>No</td>
                           				<td><img style="height: auto;width: 100px;" src="'.base_url('uploads/category_thumbnail/').$row['category_thumbnail'].'"></td>
                           				<td>'.$row['created_at'].'</td>
                           				<td>
                           					<a class="btn btn-sm" href="'.base_url('admin/category/edit/').$row['category_id'].'"> 
                           						<i class="fas fa-edit text-success"></i> 
                           						Edit
                           					</a>
                           				</td>
                           			</tr>';
                           	}
                           }else{
                           	echo '<tr><td colspan="5" class="text-center">No matching record(s) found.</td></tr>';
                           }
                           ?>					
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>Category</th>
                           <th>Parent Categories</th>
                           <th>Category Thumbnail</th>
                           <th>Created At</th>
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