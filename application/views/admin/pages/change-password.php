<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Change Password</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Dashboard</a></li>
					<li class="breadcrumb-item active">Change Password</li>
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
					<form id="formChangePassword" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>admin/change-password/save">
						<div class="card-body">	
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="current_password">Current Password</label>
										<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter current password" maxlength="15" required/>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="new_password">New Password</label>
										<input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password" maxlength="15" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="retype_password">Retype New Password</label>
										<input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Retype New password" maxlength="15" required/>
									</div>
								</div>
							</div>					
						</div>
						<div class="card-footer">
							<input type="submit" name="submit" value="Submit" class="btn btn-sm btn-success" />
							<a href="<?php echo base_url('admin'); ?>" type="button" class="btn btn-danger btn-sm ">Cancel</a>
						</div>
					</form>					
				</div>
          	</div>
        </div>
    </div>
</section>
