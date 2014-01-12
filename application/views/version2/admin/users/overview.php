<div class="container">
	<div class="page-header">
		<h1>Account Management <small>Control who has access to your Cloudlog installation.</small></h1>
	</div>
	
	<div class="row">
		<!-- Sub Nav -->
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked">
				<li class="active"><a href="<?php echo site_url('user'); ?>">User Overview</a></li>
				<li><a href="<?php echo site_url('user/add'); ?>">Add User</a></li>
			</ul>
		</div>
		
		<!-- Accounts -->
		<div class="col-md-9">
			<?php if($this->session->flashdata('notice')) { ?>
				<div class="alert alert-success">
						<?php echo $this->session->flashdata('notice'); ?>
				</div>
			<?php } ?>

				<table class="users" width="100%">
					<thhead>
					<tr>
						<th>User</th>
						<th>E-mail</th>
						<th>Type</th>
						<th></th>
					</tr>
					</thhead>

					<tbody>
					<?php
					$i = 0;
					foreach ($results->result() as $row) { ?>
					<?php  echo '<tr class="tr'.($i & 1).'">'; ?>
						<td><a href="<?php echo site_url('user/edit')."/".$row->user_id; ?>"><?php echo $row->user_name; ?></a></td>
						<td><?php echo $row->user_email; ?></td>
						<td><?php $l = $this->config->item('auth_level'); echo $l[$row->user_type]; ?></td>
						<td>
						<a class="btn btn-primary" href="<?php echo site_url('user/edit')."/".$row->user_id; ?>">Edit</a>
						<a class="btn btn-danger" href="<?php echo site_url('user/delete')."/".$row->user_id; ?>">Delete</a>
						</td>
					</tr>
					<?php $i++; } ?>
					</tbody>
				</table>
		</div>
	</div>
	
</div>