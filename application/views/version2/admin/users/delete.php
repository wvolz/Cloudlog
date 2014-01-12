<div class="container">
	<div class="page-header">
		<h1>Account Management <small>Are you sure you want to delete user?</small></h1>
	</div>
	
	<div class="row">
		<!-- Sub Nav -->
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="<?php echo site_url('user'); ?>">User Overview</a></li>
				<li><a href="<?php echo site_url('user/add'); ?>">Add User</a></li>
			</ul>
		</div>
		
		<!-- Accounts -->
		<div class="col-md-9">
			<?php echo validation_errors(); ?>

			<form method="post" action="<?php echo site_url('user/delete')."/".$this->uri->segment(3); ?>" name="users">
			
			<p>Are you sure you want to delete <strong><?php echo $user_name; ?></strong>?</p>

			<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>" />
			<div class="actions"><input class="btn btn-danger" type="submit" value="Yes, delete this user" />
			<a class="btn" href="<?php echo site_url('user'); ?>">No, do not delete this user</a></div>

			</form>
		</div>
	</div>
	
</div>