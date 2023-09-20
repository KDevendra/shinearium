<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Upload Product(s)</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('admin/product'); ?>">Product List</a></li>
					<li class="breadcrumb-item active">Upload Product(s)</li>
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
					<div class="card-header">
						<h3 class="card-title">Product(s)</h3>
					</div>	
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
					<form id="formUploadProduct" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>admin/product/save/upload">
						<div class="card-body">
							<div class="form-group">
								<label for="productfile">Choose a excel/csv file</label>
								<input type="file" class="form-control" id="productfile" name="productfile">
							</div>
						</div>
						<div class="card-footer">
							<input type="submit" name="submit" value="Submit" class="btn btn-sm btn-success" />
							<a href="<?php echo base_url('admin/product'); ?>" type="button" class="btn btn-danger btn-sm ">Cancel</a>
						</div>
					</form>					
				</div>
          	</div>
        </div>
    </div>
</section>
