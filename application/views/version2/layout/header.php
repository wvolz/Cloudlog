<!DOCTYPE html>
<html>
	<head>
		<title>Cloudlog - <?php echo $page_title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	
		<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo site_url(); ?>">Cloudlog</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo site_url('logbook');?>" title="Logbook">Logbook</a></li>
					
					<!-- QSO Creation -->
					<?php if(($this->config->item('use_auth') && ($this->session->userdata('user_type') >= 2)) || $this->config->item('use_auth') === FALSE) { ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">QSOs <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo site_url('qso');?>" title="qso">Live QSOs</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo site_url('qso/manual');?>" title="Notes">Post QSOs</a></li>
						</ul>
					</li>
					<?php } ?>
					
					<!-- Notes -->
					<?php if(($this->config->item('use_auth') && ($this->session->userdata('user_type') >= 2)) || $this->config->item('use_auth') === FALSE){ ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Notes <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo site_url('notes');?>" title="Notes">View Notes</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo site_url('notes/add');?>" title="Notes">Create Note</a></li>
						</ul>
					</li>
					<?php } ?>
					
					<li><a href="<?php echo site_url('statistics');?>" title="Statistics">Statistics</a></li>
					<li><a href="<?php echo site_url('dxcluster');?>" title="DX Cluster">Cluster</a></li>
					
					<!-- Tools -->
					<?php if(($this->config->item('use_auth') && $this->session->userdata('user_type') >= 99) || $this->config->item('use_auth') === FALSE) { ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tools <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo site_url('user');?>" title="Users">Users</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo site_url('');?>" title="Remote Interfaces">Remote Interfaces</a></li>
							<li><a href="<?php echo site_url('api/help');?>" title="API Management">API Management</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo site_url('');?>" title="Import/Export QSOs">Import/Export QSOs</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo site_url('backup');?>" title="Backup">Backup</a></li>
						</ul>
					</li>
					<?php } ?>
				</ul>
				
				<!-- Search Callsign -->
				<form class="navbar-form navbar-left" role="search" method="post" action="<?php echo site_url('search'); ?>">
					<label class="sr-only" for="callsignsearchInput">Search Callsign</label>
					<input id="callsignsearchInput" class="form-control" type="text" name="callsign" placeholder="Search Callsign">
				</form>
				
				
				<ul class="nav navbar-nav navbar-right">
				
					<?php if(($this->config->item('use_auth')) && ($this->session->userdata('user_type') >= 2)) { ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Logged in as <?php echo $this->session->userdata('user_callsign'); ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo site_url('user/profile');?>" title="Profile">Profile</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo site_url('user/logout');?>" title="Logout">Logout</a></li>
						</ul>
					</li>
					<?php } else { ?>
					<form method="post" action="<?php echo site_url('user/login'); ?>" class="navbar-form">
						<div class="form-group">
							<label class="sr-only" for="usernameInput">Username</label>
							<input id="usernameInput" class="form-control" type="text" name="user_name" placeholder="Username">
						</div>

						<div class="form-group">
							<label class="sr-only" for="passwordInput">Password</label>
							<input id="passwordInput" class="form-control" type="password" name="user_password" placeholder="Password">
						</div>
						
						<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>" />
						
						<button class="btn btn-default" type="submit">Sign in</button>
					</form>
					<?php } ?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
		</nav>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://code.jquery.com/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	</body>
</html>