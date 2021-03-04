<div class="container notes">

	<div class="card">
	  <div class="card-header">
	  	<h2 class="card-title"><?php echo $this->lang->line('notes_menu_notes'); ?></h2>
	    <ul class="nav nav-tabs card-header-tabs">
	      <li class="nav-item">
	        <a class="nav-link active" href="<?php echo site_url('notes'); ?>"><?php echo $this->lang->line('notes_menu_notes'); ?></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo site_url('notes/add'); ?>"><?php echo $this->lang->line('notes_create_note'); ?></a>
	      </li>
	    </ul>
	  </div>

	  <div class="card-body">

	    		<?php

				if ($notes->num_rows() > 0)
				{
					echo "<h3>".$this->lang->line('notes_your_notes')."</h3>";
					echo "<ul class=\"list-group\">";
					foreach ($notes->result() as $row)
					{
						echo "<li class=\"list-group-item\">";
						echo "<a href=\"".site_url()."/notes/view/".$row->id."\">".$row->title."</a>";
						echo "</li>";
					}
					echo "</ul>";
				} else {
					echo "<p>".$this->lang->line('notes_welcome')."</p>";
				}

			?>
	  </div>
	</div>
</div>
