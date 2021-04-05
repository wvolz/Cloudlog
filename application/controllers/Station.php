<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Handles Displaying of information for station tools.
*/

class Station extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		$this->load->model('user_model');
		if(!$this->user_model->authorize(2)) { $this->session->set_flashdata('notice', 'You\'re not allowed to do that!'); redirect('dashboard'); }
	}

	public function index()
	{
		$this->load->model('stations');
		$this->load->model('Logbook_model');

		$data['stations'] = $this->stations->all_with_count();
		$data['current_active'] = $this->stations->find_active();
		$data['is_there_qsos_with_no_station_id'] = $this->Logbook_model->check_for_station_id();

		// Render Page
		$data['page_title'] = "Station Location";
		$this->load->view('interface_assets/header', $data);
		$this->load->view('station_profile/index');
		$this->load->view('interface_assets/footer');
	}

	public function create() 
	{
		$this->load->model('stations');
		$this->load->model('dxcc');
		$data['dxcc_list'] = $this->dxcc->list();

        $this->load->model('logbook_model');
        $data['iota_list'] = $this->logbook_model->fetchIota();

		$this->load->library('form_validation');

		$this->form_validation->set_rules('station_profile_name', 'Station Profile Name', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title'] = "Create Station Location";
			$this->load->view('interface_assets/header', $data);
			$this->load->view('station_profile/create');
			$this->load->view('interface_assets/footer');
		}
		else
		{	
			$this->stations->add();
			
			redirect('station');
		}
	}

	public function edit($id)
	{
		$this->load->library('form_validation');

		$this->load->model('stations');
		$this->load->model('dxcc');
        $this->load->model('logbook_model');

        $data['iota_list'] = $this->logbook_model->fetchIota();

		$item_id_clean = $this->security->xss_clean($id);

		$station_profile_query = $this->stations->profile($item_id_clean);

		$data['my_station_profile'] = $station_profile_query->row();
		
		$data['dxcc_list'] = $this->dxcc->list();

		$data['page_title'] = "Edit Station Location";

		$this->form_validation->set_rules('station_profile_name', 'Station Profile Name', 'required');

        if ($this->form_validation->run() == FALSE)
        {
        	$this->load->view('interface_assets/header', $data);
            $this->load->view('station_profile/edit');
            $this->load->view('interface_assets/footer');
        }
        else
        {
            $this->stations->edit();

            $data['notice'] = "Station Profile ".$this->security->xss_clean($this->input->post('station_profile_name', true))." Updated";

            redirect('station');
        }
	}

	function reassign_profile($id) {
		// $id is the profile that needs reassigned to QSOs
		$this->load->model('stations');
		$this->stations->reassign($id);
		
		//$this->stations->logbook_session_data();
		redirect('station');
	}

	function set_active($current, $new) {
		$this->load->model('stations');
		$this->stations->set_active($current, $new);
		
		//$this->stations->logbook_session_data();
		redirect('station');
	}

	function assign_all() {
		$this->load->model('Logbook_model');
		$this->Logbook_model->update_all_station_ids();
		
		redirect('station');
	}

	public function delete($id) {
		$this->load->model('stations');
		$this->stations->delete($id);
		
		redirect('station');
	}

    public function deletelog($id) {
        $this->load->model('stations');
        $this->stations->deletelog($id);

        redirect('station');
    }

    /*
	 * Function is used for autocompletion of Counties in the station profile form
	 */
    public function get_county() {
        $json = [];

        if(!empty($this->input->get("query"))) {
            $query = isset($_GET['query']) ? $_GET['query'] : FALSE;
            $county = $this->input->get("state");

            $file = 'assets/json/US_counties.csv';

            if (is_readable($file)) {
                $lines = file($file, FILE_IGNORE_NEW_LINES);
                $input = preg_quote($county, '~');
                $reg = '~^'. $input .'(.*)$~';
                $result = preg_grep($reg, $lines);
                $json = [];
                $i = 0;
                foreach ($result as &$value) {
                    $county = explode(',', $value);
                    // Limit to 100 as to not slowdown browser too much
                    if (count($json) <= 100) {
                        $json[] = ["name"=>$county[1]];
                    }
                }
            }
        }

        header('Content-Type: application/json');
        echo json_encode($json);
    }

}