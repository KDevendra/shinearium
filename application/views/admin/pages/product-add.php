<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Add New Product</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('admin/product'); ?>">Product List</a></li>
					<li class="breadcrumb-item active">Add New Product</li>
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
						<!-- <h3 class="card-title">Product(s)</h3> -->
					</div>	
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
					<form id="formAddProduct" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>admin/product/save">
						<div class="card-body">
							<div class="row">
								<?php /*<div class="col-md-6">
									<div class="form-group">
										<label for="srial_number">Product Serial Number</label>
										<select class="form-control select2" style="width: 100%;" id="serial_number" name="serial_number">
											<option selected="selected" value="">Choose a serial number</option>
											<?php 
												foreach($serial_numbers as $row){
													echo '<option value="'.$row['serial_number'].'">'.$row['serial_number'].'</option>';
												}
											?>
										</select>
									</div>
								</div>*/ ?>
								<div class="col-md-10">
									<div class="form-group">
										<label for="title">Title</label>
										<input type="text" class="form-control" id="title" name="title" placeholder="Enter title" maxlength="150">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="order_by">Display In Order</label>
										<input type="number" class="form-control" id="order_by" name="order_by" placeholder="0" min="0"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="category">Category</label>
										<select class="form-control select2" style="width: 100%;" id="category" name="category">
											<option selected="selected" value="">Choose a category</option>
											<?php 
												foreach($parent_category as $row){
													echo '<option value="'.$row['category_id'].'">'.$row['title'].'</option>';
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
										<label for="sub_sub_category">Sub Sub-Category [Optinal]</label>
										<select class="form-control select2" style="width: 100%;" id="sub_sub_category" name="sub_sub_category">
											<option selected="selected" value="">Choose a Sub Sub-Category</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="description">Description</label>
										<textarea id="description" name="description" class="form-control summernote" rows="5"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="overview">Overview</label>
										<textarea id="overview" name="overview" class="form-control summernote" rows="5"></textarea>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="features">Features</label>
										<textarea id="features" name="features" class="form-control summernote" rows="5"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="specification">Specification</label>
										<textarea id="specification" name="specification" class="form-control summernote" rows="5"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="video_url">Video URL</label>
										<input type="text" class="form-control" id="video_url" name="video_url" placeholder="Enter video url" maxlength="255">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mb-3 form-group">
									<label for="product_image">Image(s) <span class="text-danger"><strong>Note:-</strong> Choose image and press upload button to upload image (Size should be Height:478px & Width:478px).</span></label>
									<div class="input-group">
										<div class="custom-file">
											<label class="custom-file-label" for="product_image">Choose file</label>
											<input id="product_image" type="file" name="product_image" accept=".jpg, .png, image/jpeg, image/png" value="" data-id="0" class="custom-file-input" aria-describedby="inputGroupFileAddon04">
											<small class="invalid-feedback">Image is required.</small>
											<small class="valid-feedback">Looks good!</small>
										</div>
										<div class="input-group-append">
											<button class="btn btn-outline-danger btn-upload-image" type="button" id="inputGroupFileAddon04">Upload</button>
										</div>
									</div>
									<div class="progress">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
									</div>
									<?php /*<div class="alert" role="alert"></div>
									<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="modalLabel">Crop the image and upload</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="img-container">
														<img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
													<button type="button" class="btn btn-primary" id="crop">Upload</button>
												</div>
											</div>
										</div>
									</div>*/ ?>
								</div>
								<div class="product-thumbs row cols-lg-1 cols-4 gutter-sm mb-3"></div>
							</div>	
							<hr/>
							<span class="font-weight-bold">Datasheet <span class="text-danger">(<strong>Note:-</strong> Choose pdf and press upload button to upload file.)</span></span>
							<span class="datasheet-view-btn-area">
								
							</span>
							<div class="row mt-2">
								<div class="col-md-4 form-group">
									<div class="input-group">
										<div class="custom-file">
											<label class="custom-file-label" for="datasheet_file">Choose a pdf file</label>
											<input id="datasheet_file" type="file" name="datasheet_file" accept="application/pdf" value="" data-id="" data-uploaded="" class="custom-file-input" aria-describedby="datasheet">
											<input type="hidden" name="datasheet_uploaded_file" id="datasheet_uploaded_file" value=""/>
										</div>
										<div class="input-group-append">
											<button class="btn btn-outline-danger btn-upload-file" type="button" id="datasheet">Upload</button>
										</div>
									</div>									
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" id="datasheet_title" name="datasheet_title" placeholder="Enter title for datasheet" maxlength="255" value="">
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="datasheet_url" name="datasheet_url" placeholder="Enter url for datasheet" maxlength="255" value="">
								</div>
							</div>	
							<span class="font-weight-bold">Reference Manual<span class="text-danger">(<strong>Note:-</strong> Choose pdf and press upload button to upload file.)</span></span>
							<span class="reference_manual-view-btn-area">
								
							</span>
							<div class="row mt-2">
								<div class="col-md-4 form-group">
									<div class="input-group">
										<div class="custom-file">
											<label class="custom-file-label" for="reference_manual_file">Choose a pdf file</label>
											<input id="reference_manual_file" type="file" name="reference_manual_file" accept="application/pdf" value="" data-id="" data-uploaded="" class="custom-file-input" aria-describedby="reference_manual">
											<input type="hidden" name="reference_manual_uploaded_file" id="reference_manual_uploaded_file" value=""/>
										</div>
										<div class="input-group-append">
											<button class="btn btn-outline-danger btn-upload-file" type="button" id="reference_manual">Upload</button>
										</div>
									</div>									
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" id="reference_manual_title" name="reference_manual_title" placeholder="Enter title for reference manual" maxlength="255" value="">
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="reference_manual_url" name="reference_manual_url" placeholder="Enter url for reference manual" maxlength="255" value="">
								</div>
							</div>	
							<span class="font-weight-bold">Quick Installation Guide<span class="text-danger">(<strong>Note:-</strong> Choose pdf and press upload button to upload file.)</span></span>
							<span class="quick_installation_guide-view-btn-area">
								
							</span>
							<div class="row mt-2">
								<div class="col-md-4 form-group">
									<div class="input-group">
										<div class="custom-file">
											<label class="custom-file-label" for="quick_installation_guide_file">Choose a pdf file</label>
											<input id="quick_installation_guide_file" type="file" name="quick_installation_guide_file" accept="application/pdf" value="" data-id="" data-uploaded="" class="custom-file-input" aria-describedby="quick_installation_guide">
											<input type="hidden" name="quick_installation_guide_uploaded_file" id="quick_installation_guide_uploaded_file" value=""/>
										</div>
										<div class="input-group-append">
											<button class="btn btn-outline-danger btn-upload-file" type="button" id="quick_installation_guide">Upload</button>
										</div>
									</div>									
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" id="quick_installation_guide_title" name="quick_installation_guide_title" placeholder="Enter title for quick installation guide" maxlength="255" value="">
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="quick_installation_guide_url" name="quick_installation_guide_url" placeholder="Enter url for quick installation guide" maxlength="255" value="">
								</div>
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
<style>
	.img-wrap {
		position: relative;
		display: inline-block;
		font-size: 0;
	}
	.img-wrap .close {
		position: absolute;
		top: -6px;
		right: -5px;
		z-index: 100;
		background-color: #ff0101;
		padding: 5%;
		color: #fff;
		font-weight: 500;
		cursor: pointer;
		opacity: 2;
		text-align: center;
		font-size: 20px;
		line-height: 10px;
		border-radius: 50%;
	}
	.img-wrap:hover .close {
		opacity: 9 !important;
	}

	.alert {
      display: none;
    }

	.progress {
		display: none;
		margin-bottom: 1rem;
    }
	.img-container img {
      	max-width: 100%;
    }
</style>
