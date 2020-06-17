<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_col_mode_tooshort extends CI_Migration {
        public function up()
        {
                $fields = array(
                        'COL_MODE' => array(
                                'name' => 'COL_MODE',
                                'type' => 'VARCHAR',
                                'constraint' => '12',
                        )
                );
                $this->dbforge->modify_column($this->config->item('table_name'), $fields);
        }
        public function down()
        {
                echo "Not possible, sorry.";
        }
}
