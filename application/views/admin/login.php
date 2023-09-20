<?php include_once 'widgets/includes_top.php'; ?>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
	<img class="animation__shake" src="<?php echo base_url('include/admin/');?>dist/img/AdminLTELogo.png" alt="Web Flowmechs" height="60" width="60">
</div>
<div class="login-box">
  	<div class="card card-outline card-primary">
		<div class="card-header text-center">
			<a href="<?php base_url('admin'); ?>" class="h1"><b>Web flowmechs Admin Login</b></a>
		</div>
    	<div class="card-body">
      		<p class="login-box-msg">Sign in to start your session</p>
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
			<form action="<?php base_url('');?>admin/login" method="post">
				<div class="input-group mb-3">
					<input type="email" class="form-control" placeholder="Email" name="email" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<?php /*
						<div class="col-8">
							<div class="icheck-primary">
							<input type="checkbox" id="remember">
							<label for="remember">
								Remember Me
							</label>
							</div>
						</div>*/ ?>
					<div class="col-12">
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
				</div>
      		</form>
			<!-- <p class="mb-1">
				<a href="forgot-password.html">I forgot my password</a>
			</p> -->
    	</div>
  	</div>
</div>
<?php include_once 'widgets/includes_bottom.php'; ?>
