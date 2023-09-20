<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Product Details</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('admin/product'); ?>">Product List</a></li>
					<li class="breadcrumb-item active">Product Details</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<section class="content">
	<div class="container-fluid">
        <div class="row">
          	<div class="col-md-12">
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<h2 class="profile-username text-center font-weight-bold"><?php echo $details->title; ?></h3>
						<p class="text-muted text-center"><?php echo $details->category; ?></p>
					</div>
				</div>
				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">Image(s)</h3>
					</div>
					<div class="card-body">
						<?php
							if(count($details->images) > 0){
								foreach($details->images as $image_url)
								{
									echo '<img class="profile-user-img img-fluid m-2" src="'.$image_url.'" alt="'.$details->title.'" />';
								}
							}else{
								echo '<span class="text-danger font-weight-bold p-2 ml-4 no-img-span">No image(s) uploaded!</span>';
							}							
						?>
					</div>
				</div>
          	</div>
          	<div class="col-md-12">
				<div class="card">
					<div class="card-header p-2">
						<ul class="nav nav-pills">
							<li class="nav-item"><a class="nav-link active" href="#description" data-toggle="tab">Description</a></li>
							<li class="nav-item"><a class="nav-link" href="#overview" data-toggle="tab">Overview</a></li>
							<li class="nav-item"><a class="nav-link" href="#features" data-toggle="tab">Features</a></li>
							<li class="nav-item"><a class="nav-link" href="#specification" data-toggle="tab">Specification</a></li>
							<li class="nav-item"><a class="nav-link" href="#downloads" data-toggle="tab">Downloads</a></li>
						</ul>
					</div>
					<div class="card-body overflow-auto" style="max-height: 350px;">
						<div class="tab-content">
							<div class="active tab-pane" id="description">
								<h3 class="font-weight-bold">Description</h3>
								<p>
									<?php print_r($details->description); ?>
								</p>
							</div>
							<div class="tab-pane" id="overview">
								<h3 class="font-weight-bold">Overview</h3>
								<p>
									<?php print_r($details->overview); ?>
								</p>
							</div>
							<div class="tab-pane" id="features">
								<h3 class="font-weight-bold">Features</h3>
								<p>
									<?php print_r($details->features); ?>
								</p>
							</div>
							<div class="tab-pane" id="specification">
								<h3 class="font-weight-bold">Specification</h3>
								<p>
									<?php print_r($details->specification); ?>
								</p>
							</div>
							<div class="tab-pane" id="downloads">
								<h3 class="font-weight-bold">Downloads</h3>
								<p>
									<?php
										echo '<h5>Datasheet</h5>';
										if($details->datasheet_file){
											echo '<a href="'.$details->datasheet_file_url.'" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> View Datasheet</a>';
										}else if($details->datasheet_url){
											echo '<a href="'.$details->datasheet_url.'" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> '.$details->datasheet_title.'</a>';
										}else{
											echo '<span class="text-danger">No datasheet url or file uploaded</span>';
										}
										echo '<h5>Reference Manual</h5>';
										if($details->reference_manual_file){
											echo '<a href="'.$details->reference_manual_file_url.'" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> View Reference Manual</a>';
										}else if($details->reference_manual_url){
											echo '<a href="'.$details->reference_manual_url.'" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> '.$details->reference_manual_title.'</a>';
										}else{
											echo '<span class="text-danger">No Reference Manual url or file uploaded</span>';
										}
										echo '<h5>Quick Installation Guide</h5>';
										if($details->quick_installation_guide_file){
											echo '<a href="'.$details->quick_installation_guide_file_url.'" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> View Quick Installation Guide</a>';
										}else if($details->quick_installation_guide_url){
											echo '<a href="'.$details->quick_installation_guide_url.'" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> '.$details->quick_installation_guide_title.'</a>';
										}else{
											echo '<span class="text-danger">No Quick Installation Guide url or file uploaded</span>';
										}
									?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card card-info card-outline">
					<div class="card-body box-profile">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="<?php echo $details->video_url; ?>" allowfullscreen></iframe>
						</div>
					</div>
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
</style>
