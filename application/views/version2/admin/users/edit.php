<div class="container">
	<div class="page-header">
		<h1>Account Management <small>Edit User</small></h1>
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
			<?php if(validation_errors()) { ?>
			<div class="alert alert-warning"><?php echo validation_errors(); ?></div>
			<?php } ?>
			
			<?php $this->load->helper('form'); ?>
			<form role="form" method="post" action="<?php echo site_url('user/edit')."/".$this->uri->segment(3); ?>" name="users">
				
				<div class="form-group">
					<label for="usernameInput">Username</label>
					<input class="form-control" type="text" name="user_name" value="<?php if(isset($user_name)) { echo $user_name; } ?>" />
					<?php if(isset($username_error)) { echo "<div class=\"small error\">".$username_error."</div>"; } ?>
				</div>
				
				<div class="form-group">
					<label for="levelInput">Level</label>
					<?php if($this->session->userdata('user_type') == 99) { ?>
					<select name="user_type" class="form-control">
					<?php

							$levels = $this->config->item('auth_level');
							while (list($key, $val) = each($levels)) {
							?>
							<option value="<?php echo $key; ?>" <?php if($user_type == $key) { echo "selected=\"selected\""; } ?>><?php echo $val; ?></option>
							<?php } ?>
					</select>
					<?php } else { 
						$l = $this->config->item('auth_level');
						echo $l[$user_type];
					}?>
				</div>
				
				<div class="form-group">
					<label for="emailInput">E-mail</label>
					<input class="form-control" type="text" name="user_email" value="<?php if(isset($user_email)) { echo $user_email; } ?>" />
					<?php if(isset($email_error)) { echo "<div class=\"small error\">".$email_error."</div>"; } ?>
				</div>
				
				<div class="form-group">
					<label for="passwordInput">Password</label>
					<input type="password" class="form-control" name="user_password" />
					<?php if(isset($password_error)) { echo "<div class=\"small error\">".$password_error."</div>"; } else { ?>
					<div class="small">Leave blank to keep existing password</div></td>
					<?php } ?>
				</div>
				
				<div class="form-group">
					<label for="firstnameInput">First Name</label>
					<input class="form-control" type="text" name="user_firstname" value="<?php if(isset($user_firstname)) { echo $user_firstname; } ?>" />
					<?php if(isset($firstname_error)) { echo "<div class=\"small error\">".$firstname_error."</div>"; } else { ?>
					<?php } ?>
				</div>
				
				<div class="form-group">
					<label for="lastnameInput">Last Name</label>
					<input class="form-control" type="text" name="user_lastname" value="<?php if(isset($user_lastname)) { echo $user_lastname; } ?>" />
					<?php if(isset($lastname_error)) { echo "<div class=\"small error\">".$lastname_error."</div>"; } else { ?>
					<?php } ?>
				</div>
				
				<div class="form-group">
					<label for="callsignInput">Callsign</label>
					<input class="form-control" type="text" name="user_callsign" value="<?php if(isset($user_callsign)) { echo $user_callsign; } ?>" />
					<?php if(isset($callsign_error)) { echo "<div class=\"small error\">".$callsign_error."</div>"; } else { ?>
					<?php } ?>
				</div>
				
				<div class="form-group">
					<label for="locatorInput">Locator</label>
					<input class="form-control" type="text" name="user_locator" value="<?php if(isset($user_locator)) { echo $user_locator; } ?>" />
					<?php if(isset($locator_error)) { echo "<div class=\"small error\">".$locator_error."</div>"; } else { ?>
					<?php } ?>
				</div>
				
				<div class="form-group">
					<label for="timezoneInput">Timezone</label>
					<?php echo form_dropdown('user_timezone', $timezones, $user_timezone); ?>
				</div>
				
				<fieldset>
						<legend>Logbook of The World (LoTW)</legend>
						
					<div class="form-group">
						<label for="lotwusernameInput">Logbook of The World (LoTW) Username</label>
						<input class="form-control" type="text" name="user_lotw_name" value="<?php if(isset($user_lotw_name)) { echo $user_lotw_name; } ?>" />
						<?php if(isset($userlotwname_error)) { echo "<div class=\"small error\">".$userlotwname_error."</div>"; } ?>
					</div>
					
					<div class="form-group">
						<label for="lotwpasswordInput">Logbook of The World (LoTW) Password</label>
						<input class="form-control" type="password" name="user_lotw_password" />
						<?php if(isset($lotwpassword_error)) { echo "<div class=\"small error\">".$lotwpassword_error."</div>"; } else { ?>
						<div class="small">Leave blank to keep existing password</div></td>
						<?php } ?>
					</div>
				</fieldset>
				
				<fieldset>
					<legend>eQSL.cc</legend>
						
					<div class="form-group">
						<label for="eqslusernameInput">eQSL.cc Username</label>
						<input class="form-control" type="text" name="user_eqsl_name" value="<?php if(isset($user_eqsl_name)) { echo $user_eqsl_name; } ?>" />
						<?php if(isset($usereqslname_error)) { echo "<div class=\"small error\">".$usereqslname_error."</div>"; } ?>
					</div>
					
					<div class="form-group">
						<label for="eqslpasswordInput">eQSL.cc Password</label>
						<input class="form-control" type="password" name="user_eqsl_password" />
						<?php if(isset($eqslpassword_error)) { echo "<div class=\"small error\">".$eqslpassword_error."</div>"; } else { ?>
						<div class="small">Leave blank to keep existing password</div></td>
						<?php } ?>
					</div>
				</fieldset>

			<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>" />
			
			<input class="btn" type="submit" value="Update profile" />

			</form>
		</div>
	</div>
	
</div>