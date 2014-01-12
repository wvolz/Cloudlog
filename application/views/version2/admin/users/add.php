<div class="container">
	<div class="page-header">
		<h1>Account Management <small>Create a new user.</small></h1>
	</div>
	
	<div class="row">
		<!-- Sub Nav -->
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="<?php echo site_url('user'); ?>">User Overview</a></li>
				<li class="active"><a href="<?php echo site_url('user/add'); ?>">Add User</a></li>
			</ul>
		</div>
		
		<!-- Accounts -->
		<div class="col-md-9">
			<?php if($this->session->flashdata('notice')) { ?>
					<div class="alert alert-info">
							<?php echo $this->session->flashdata('notice'); ?>
					</div>
			<?php } ?>
			<?php

			$this->load->helper('form');

			?>
			<div class="alert alert-warning">
			<?php echo validation_errors(); ?>
			</div>

			<form method="post" action="<?php echo site_url('user/add'); ?>" name="users" role="form">
				<div class="form-group">
					<label for="usernameInput">Username</label>
					<input id="usernameInput" class="form-control" type="text" name="user_name" value="<?php if(isset($user_name)) { echo $user_name; } ?>" />
					<?php if(isset($username_error)) { echo "<div class=\"small error\">".$username_error."</div>"; } ?>
				</div>
				
				<div class="form-group">
					<label for="userlevelInput">Level</label>
					<select name="user_type" class="form-control">
							<?php
							
							$levels = $this->config->item('auth_level');
							while (list($key, $val) = each($levels)) {
							?>
							<option value="<?php echo $key; ?>" <?php if(isset($user_type)) { if($user_type == $key) { echo "selected=\"selected\""; } } ?>><?php echo $val; ?></option>
							<?php } ?>
					</select>
				</div>
				
				<div class="form-group">
					<label for="emailInput">E-mail</label>
					<input class="form-control" type="text" name="user_email" value="<?php if(isset($user_email)) { echo $user_email; } ?>" />
					<?php if(isset($email_error)) { echo "<div class=\"small error\">".$email_error."</div>"; } ?>
				</div>

				<div class="form-group">
					<label for="passwordInput">Password</label>
					<input id="passwordInput" class="form-control" type="password" name="user_password" value="<?php if(isset($user_password)) { echo $user_password; } ?>" />
					<?php if(isset($password_error)) { echo "<div class=\"small error\">".$password_error."</div>"; } ?>
				</div>
	
				<div class="form-group">
					<label for="firstnameInput">First Name</label>
					<input type="text" class="form-control" name="user_firstname" value="<?php if(isset($user_firstname)) { echo $user_firstname; } ?>" />
					<?php if(isset($firstname_error)) { echo "<div class=\"small error\">".$firstname_error."</div>"; } ?>
				</div>
				
				<div class="form-group">
					<label for="lastnameInput">Last Name</label>
					<input type="text" class="form-control" name="user_lastname" value="<?php if(isset($user_lastname)) { echo $user_lastname; } ?>" />
					<?php if(isset($lastname_error)) { echo "<div class=\"small error\">".$lastname_error."</div>"; } ?>
				</div>
			
				<div class="form-group">
					<label for="callsignInput">Callsign</label>
					<input type="text" class="form-control" name="user_callsign" value="<?php if(isset($user_callsign)) { echo $user_callsign; } ?>" />
					<?php if(isset($callsign_error)) { echo "<div class=\"small error\">".$callsign_error."</div>"; } ?>
				</div>
				
				<div class="form-group">
					<label for="locatorInput">Locator</label>
					<input type="text" class="form-control" name="user_locator" value="<?php if(isset($user_locator)) { echo $user_locator; } ?>" />
					<?php if(isset($locator_error)) { echo "<div class=\"small error\">".$locator_error."</div>"; } ?>
				</div>
				
				<div class="form-group">
					<label for="timezoneInput">Timezone</label>
					<?php echo form_dropdown('user_timezone', $timezones, 0); ?>
				</div>
				
			<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>" />
			<input class="btn btn-default" type="submit" value="Submit" />

			</form>
		
		</div>
	</div>
	
</div>