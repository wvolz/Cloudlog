<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
*   This migration creates a table called options which will hold global options needed within cloudlog
*   removing the need for lots of configuration files.
*/

class Migration_add_globalsearch_to_options extends CI_Migration {

    public function up()
    {
        $data = array(
            array('option_name' => "global_search", 'option_value' => "false", 'autoload' => "yes"),
         );

         $this->db->insert_batch('options', $data);
    }

    public function down()
    {
        // No option to down
    }
}