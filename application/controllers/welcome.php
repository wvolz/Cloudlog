<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


  public function index()
  {
		$data['page_title'] = "Example";
		$this->load->view('version2/layout/header', $data);
		$this->load->view('version2/layout/footer', $data);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */