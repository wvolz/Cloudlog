<div class="container">

	<br>

		<?php if($this->session->flashdata('message')) { ?>
			<!-- Display Message -->
			<div class="alert-message error">
			  <p><?php echo $this->session->flashdata('message'); ?></p>
			</div>
		<?php } ?>

	<h2><?php echo $page_title; ?></h2>

	<nav class="nav">
	  <?php if ($sat_active) { ?>
	  <a class="nav-link" href="<?php echo site_url('gridsquares/satellites'); ?>">Satellites</a>
	  <?php } ?>
	  <a class="nav-link" href="<?php echo site_url('gridsquares/band/All'); ?>">Band</a>
	</nav>
</div>
