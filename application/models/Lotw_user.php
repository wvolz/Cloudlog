<?php

class Lotw_user extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	
	function empty_table() {
		$this->db->empty_table('lotw_userlist'); 
	}

	function add_lotwuser($callsign, $date) {

		$data = array(
		        'callsign' => $callsign,
		        'upload_date' => $date
		);

		$this->db->insert('lotw_userlist', $data);
	}

	function check($callsign) {
		$this->db->where('callsign', $callsign);
		$query = $this->db->get('lotw_userlist');

		if ($query->num_rows() > 0) {
			return "active";
		} else {
			return "not found";
		}
	}
}
?>