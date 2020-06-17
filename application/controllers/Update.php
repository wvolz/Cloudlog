<?php
class Update extends CI_Controller {

	/*
		Controls Updating Elements of Cloudlog
		Functions:
			dxcc - imports the latest clublog cty.xml data
			lotw_users - imports lotw users
	*/

	public function index()
	{
	    $data['page_title'] = "Updates";
	    $this->load->view('interface_assets/header', $data);
	    $this->load->view('update/index');
	    $this->load->view('interface_assets/footer');

	}

    /*
     * Load the dxcc entities
     */
	public function dxcc_entities() {
		// Load Database connectors
		$this->load->model('dxcc_entities');

		// Load the cty file
		$xml_data = simplexml_load_file("updates/cty.xml");
		
		//$xml_data->entities->entity->count();

        $count = 0;
		foreach ($xml_data->entities->entity as $entity) {
			$startinfo = strtotime($entity->start);
            $endinfo = strtotime($entity->end);
            
            $start_date = ($startinfo) ? date('m-d-Y H:i:s',$startinfo) : null;
            $end_date = ($endinfo) ? date('m-d-Y H:i:s',$endinfo) : null;
        
            if(!$entity->cqz) {
                $data = array(
                    'prefix' => (string) $entity->call,
                    'name' =>  (string) $entity->entity,
                );
            } else {
                $data = array(
                    'adif' => (int) $entity->adif,
                    'name' =>  (string) $entity->name,
                    'prefix' => (string)  $entity->prefix,
                    'ituz' => (float) $entity->ituz,
                    'cqz' => (int) $entity->cqz,
                    'cont' => (string) $entity->cont,
                    'long' => (float) $entity->long,
                    'lat' => (float) $entity->lat,
                	'start' => $start_date,
                    'end' => $end_date,
                );	
            }
        
            $this->db->insert('dxcc_entities', $data); 
            $count += 1;
            if ($count % 10  == 0)
                $this->update_status();
		}

        $this->update_status();
	    return $count;	
	}

    /*
     * Load the dxcc exceptions
     */
	public function dxcc_exceptions() {
		// Load Database connectors
		$this->load->model('dxcc_exceptions');
		// Load the cty file
		$xml_data = simplexml_load_file("updates/cty.xml");
		
        $count = 0;
		foreach ($xml_data->exceptions->exception as $record) {
			$startinfo = strtotime($record->start);
            $endinfo = strtotime($record->end);
            
            $start_date = ($startinfo) ? date('m-d-Y H:i:s',$startinfo) : null;
            $end_date = ($endinfo) ? date('m-d-Y H:i:s',$endinfo) : null;

            $data = array(
            	'record' => (int) $record->attributes()->record,
            	'call' => (string) $record->call,
            	'entity' =>  (string) $record->entity,
                'adif' => (int) $record->adif,
                'cqz' => (int) $record->cqz,
                'cont' => (string) $record->cont,
                'long' => (float) $record->long,
                'lat' => (float) $record->lat,
                'start' => $start_date,
                'end' => $end_date,
            );
       
            $this->db->insert('dxcc_exceptions', $data); 
            $count += 1;
            if ($count % 10  == 0)
                $this->update_status();
		}

        $this->update_status();
	    return $count;	
	}

    /*
     * Load the dxcc prefixes
     */
	public function dxcc_prefixes() {
		// Load Database connectors
		$this->load->model('dxcc_prefixes');
		// Load the cty file
		$xml_data = simplexml_load_file("updates/cty.xml");
		
        $count = 0;
		foreach ($xml_data->prefixes->prefix as $record) {
			$startinfo = strtotime($record->start);
            $endinfo = strtotime($record->end);
            
            $start_date = ($startinfo) ? date('m-d-Y H:i:s',$startinfo) : null;
            $end_date = ($endinfo) ? date('m-d-Y H:i:s',$endinfo) : null;
            
            $data = array(
            	'record' => (int) $record->attributes()->record,
            	'call' => (string) $record->call,
            	'entity' =>  (string) $record->entity,
                'adif' => (int) $record->adif,
                'cqz' => (int) $record->cqz,
                'cont' => (string) $record->cont,
                'long' => (float) $record->long,
                'lat' => (float) $record->lat,
                'start' => $start_date,
                'end' => $end_date,
            );
       
            $this->db->insert('dxcc_prefixes', $data); 
            $count += 1;
            if ($count % 10  == 0)
                $this->update_status();
		}

		//print("$count prefixes processed");
        $this->update_status();
	    return $count;	
	}

	// Updates the DXCC & Exceptions from the Club Log Cty.xml file.
	public function dxcc() {
	    $this->update_status("Downloading file");

	    // give it 5 minutes...
	    set_time_limit(600);
	
		// Load Migration data if any.
		$this->load->library('migration');
		$this->fix_migrations();
		$this->migration->latest();

		// Download latest file.
		$url = "https://cdn.clublog.org/cty.php?api=a11c3235cd74b88212ce726857056939d52372bd";
		
		$gz = gzopen($url, 'r');
		$data = "";
		while (!gzeof($gz)) {
		  $data .= gzgetc($gz);
		}
		gzclose($gz);
		
		file_put_contents('./updates/cty.xml', $data);
	
	    // Clear the tables, ready for new data
		$this->db->empty_table("dxcc_entities");
		$this->db->empty_table("dxcc_exceptions");
		$this->db->empty_table("dxcc_prefixes");
		$this->update_status();

	    // Parse the three sections of the file and update the tables
	    $this->db->trans_start();
		$this->dxcc_entities();
		$this->dxcc_exceptions();
		$this->dxcc_prefixes();
		$this->db->trans_complete();

		$this->update_status("DONE");
	}

	public function update_status($done=""){

        if ($done != "Downloading file"){
            // Check that everything is done?
            if ($done == ""){
                $done = "Updating...";
            }
            $html = $done."<br/>";
            $html .= "Dxcc Entities: ".$this->db->count_all('dxcc_entities')."<br/>";
            $html .= "Dxcc Exceptions: ".$this->db->count_all('dxcc_exceptions')."<br/>";
            $html .= "Dxcc Prefixes: ".$this->db->count_all('dxcc_prefixes')."<br/>";
        }else{
            $html = $done."....<br/>";
        }

        file_put_contents('./updates/status.html', $html);
	}


	private function fix_migrations(){
        $res = $this->db->query("select version from migrations");
        if ($res->num_rows() >0){
            $row = $res->row();
            $version = $row->version;

            if ($version < 7){
                $this->db->query("update migrations set version=7");
            }
        }
	}
	
	public function check_missing_dxcc($all = false){
	    $this->load->model('logbook_model');
        $this->logbook_model->check_missing_dxcc_id($all);

	}

    public function update_clublog_scp() {
        $strFile = "./updates/clublog_scp.txt";
        $url = "https://cdn.clublog.org/clublog.scp.gz";
        set_time_limit(300);
        $this->update_status("Downloading Club Log SCP file");
        $gz = gzopen($url, 'r');
        if ($gz)
        {
            $data = "";
            while (!gzeof($gz)) {
                $data .= gzgetc($gz);
            }
            gzclose($gz);
            file_put_contents($strFile, $data);
            if (file_exists($strFile))
            {
                $nCount = count(file($strFile));
                if ($nCount > 0)
                {
                    $this->update_status("DONE: " . number_format($nCount) . " callsigns loaded" );
                } else {
                    $this->update_status("FAILED: Empty file");
                }
            } else {
                $this->update_status("FAILED: Could not create Club Log SCP file locally");
            }
        } else {
            $this->update_status("FAILED: Could not connect to Club Log");
        }
    }

}
?>
