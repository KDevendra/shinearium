<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Add New Sub [Sub-]Category</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('admin/category'); ?>">Category List</a></li>
					<li class="breadcrumb-item active">Add New Sub [Sub-]Category</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-info">
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
					<form id="formAddProduct" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>admin/category/save">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="category">Category</label>
										<select class="form-control select2" style="width: 100%;" id="category" name="category">
											<option selected="selected" value="">Choose a category</option>
											<?php
											foreach ($parent_category as $row) {
												echo '<option value="' . $row['category_id'] . '">' . $row['title'] . '</option>';
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="sub_category">Sub Category</label>
										<select class="form-control select2" style="width: 100%;" id="sub_category" name="sub_category">
											<option selected="selected" value="">Choose a Sub Category</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="display_in_order">Display In Order </label>
										<input type="number" class="form-control" placeholder="Enter Display In Order " name="display_in_order">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="sub_category">Category Thumbnail <span class="text-danger"><small>(Note:- Width:300px, Height:400px, File Max Size 250KB)</small></span></label>
										<input type="file" class="form-control" name="category_thumbnail">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="title">Title</label>
										<input type="text" class="form-control" id="title" name="title" placeholder="Enter title" maxlength="150">
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<input type="submit" name="submit" value="Submit" class="btn btn-sm btn-success" />
							<a href="<?php echo base_url('admin/category'); ?>" type="button" class="btn btn-danger btn-sm ">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>