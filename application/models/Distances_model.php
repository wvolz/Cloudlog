<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Distances_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public $bandslots = array("160m"=>0,
        "80m"=>0,
        "60m"=>0,
        "40m"=>0,
        "30m"=>0,
        "20m"=>0,
        "17m"=>0,
        "15m"=>0,
        "12m"=>0,
        "10m"=>0,
        "6m" =>0,
        "4m" =>0,
        "2m" =>0,
        "70cm"=>0,
        "23cm"=>0,
        "13cm"=>0,
        "9cm"=>0,
        "6cm"=>0,
        "3cm"=>0,
        "1.25cm"=>0);

    function get_worked_sats() {
        $CI =& get_instance();
        $CI->load->model('Stations');
        $station_id = $CI->Stations->find_active();

        // get all worked sats from database
        $sql = "SELECT distinct col_sat_name FROM ".$this->config->item('table_name')." WHERE station_id = ".$station_id . " and coalesce(col_sat_name, '') <> '' ORDER BY col_sat_name";

        $data = $this->db->query($sql);

        $worked_sats = array();
        foreach($data->result() as $row){
            array_push($worked_sats, $row->col_sat_name);
        }

        return $worked_sats;
    }

    function get_worked_bands() {
        $CI =& get_instance();
        $CI->load->model('Stations');
        $station_id = $CI->Stations->find_active();

        // get all worked slots from database
        $sql = "SELECT distinct LOWER(COL_BAND) as COL_BAND FROM ".$this->config->item('table_name')." WHERE station_id = ".$station_id;

        $data = $this->db->query($sql);
        $worked_slots = array();
        foreach($data->result() as $row){
            array_push($worked_slots, $row->COL_BAND);
        }

        // bring worked-slots in order of defined $bandslots
        $results = array();
        foreach(array_keys($this->bandslots) as $slot) {
            if(in_array($slot, $worked_slots)) {
                array_push($results, $slot);
            }
        }
        return $results;
    }

    function get_distances($postdata, $measurement_base)
    {
        $CI =& get_instance();
        $CI->load->model('Stations');
        $station_id = $CI->Stations->find_active();
        
        $station_gridsquare = $CI->Stations->find_gridsquare();
        $gridsquare = explode(',', $station_gridsquare); // We need to convert to an array, since a user can enter several gridsquares

        $this->db->select('col_call callsign, col_gridsquare grid');
        $this->db->where('LENGTH(col_gridsquare) >', 0);

        if ($postdata['band'] == 'sat') {
            $this->db->where('col_prop_mode', $postdata['band']);
            if ($postdata['sat'] != 'All') {
                $this->db->where('col_sat_name', $postdata['sat']);
            }
        }
        else {
            $this->db->where('col_band', $postdata['band']);
        }
        $this->db->where('station_id', $station_id);
        $dataarrayata = $this->db->get($this->config->item('table_name'));
        $this->plot($dataarrayata->result_array(), $gridsquare, $measurement_base);
    }

    // This functions takes query result from the database and extracts grids from the qso,
    // then calculates distance between homelocator and locator given in qso.
    // It builds an array, which has 50km intervals, then inputs each length into the correct spot
    // The function returns a json-encoded array.
    function plot($qsoArray, $gridsquare, $measurement_base) {
        $stationgrid = strtoupper($gridsquare[0]);              // We use only the first entered gridsquare from the active profile
        if (strlen($stationgrid) == 4) $stationgrid .= 'MM';    // adding center of grid if only 4 digits are specified

        switch ($measurement_base) {
            case 'M':
                $unit = "mi";
                $dist = '13000';
                break;
            case 'K':
                $unit = "km";
                $dist = '20000';
                break;
            case 'N':
                $unit = "nmi";
                $dist = '11000';
                break;
            default:
                $unit = "km";
                $dist = '20000';
        }

        if (!$this->valid_locator($stationgrid)) {
            header('Content-Type: application/json');
            echo json_encode(array('Error' => 'Error. There is a problem with the gridsquare set in your profile!'));
        }
        else {
            // Making the array we will use for plotting, we save occurrences of the length of each qso in the array
            $j = 0;
            for ($i = 0; $j < $dist; $i++) {
                $dataarray[$i]['dist'] =  $j . $unit . ' - ' . ($j + 50) . $unit;
                $dataarray[$i]['count'] = 0;
                $dataarray[$i]['calls'] = '';
                $dataarray[$i]['callcount'] = 0;
                $j += 50;
            }
    
            $qrb = array (					                                            // Used for storing the QSO with the longest QRB
                'Callsign' => '',
                'Grid' => '',
                'Distance' => '',
                'Qsoes' => '',
                'Grids' => ''
            );
    
            foreach ($qsoArray as $qso) {
                $qrb['Qsoes']++;                                                        // Counts up number of qsoes
                $bearingdistance = $this->bearing_dist($stationgrid, $qso['grid'], $measurement_base);     // Calculates distance based on grids
                $arrayplacement = $bearingdistance / 50;                                // Resolution is 50, calculates where to put result in array
                if ($bearingdistance > $qrb['Distance']) {                              // Saves the longest QSO
                    $qrb['Distance'] = $bearingdistance;
                    $qrb['Callsign'] = $qso['callsign'];
                    $qrb['Grid'] = $qso['grid'];
                }
                $dataarray[$arrayplacement]['count']++;                                               // Used for counting total qsoes plotted
                if ($dataarray[$arrayplacement]['callcount'] < 5) {                     // Used for tooltip in graph, set limit to 5 calls shown
                    if ($dataarray[$arrayplacement]['callcount'] > 0) {
                        $dataarray[$arrayplacement]['calls'] .= ', ';
                    }
                    $dataarray[$arrayplacement]['calls'] .= $qso['callsign'];
                    $dataarray[$arrayplacement]['callcount']++;
                }
            }
    
            if (!$qrb['Qsoes'] == 0) {  // We have a result :)
                header('Content-Type: application/json');
                $data['ok'] = 'OK';
                $data['qrb'] = $qrb;
                $data['qsodata'] = $dataarray;
                $data['unit'] = $unit;
                echo json_encode($data);
            }
            else {
                header('Content-Type: application/json');
                echo json_encode(array('Error' => 'No QSOs found to plot.'));
            }
        }
    }

    /*
     * Checks the validity of the locator
     * Input: locator
     * Returns: bool
     */
    function valid_locator ($loc) {
        $regex = '^[A-R]{2}[0-9]{2}[A-X]{2}$';
        if (preg_match("%{$regex}%i", $loc)) {
            return true;
        }
        else {
            return false;
        }
    }

    /*
     * Converts locator to latitude and longitude
     * Input: locator
     * Returns: array with longitude and latitude
     */
    function loc_to_latlon ($loc) {
        /* lat */
        $l[0] =
            (ord(substr($loc, 1, 1))-65) * 10 - 90 +
            (ord(substr($loc, 3, 1))-48) +
            (ord(substr($loc, 5, 1))-65) / 24 + 1/48;
        $l[0] = $this->deg_to_rad($l[0]);
        /* lon */
        $l[1] =
            (ord(substr($loc, 0, 1))-65) * 20 - 180 +
            (ord(substr($loc, 2, 1))-48) * 2 +
            (ord(substr($loc, 4, 1))-65) / 12 + 1/24;
        $l[1] = $this->deg_to_rad($l[1]);

        return $l;
    }

    function deg_to_rad ($deg) {
        return (M_PI * $deg/180);
    }

    function bearing_dist($loc1, $loc2, $measurement_base) {
        $loc1 = strtoupper($loc1);
        $loc2 = strtoupper($loc2);
        
        if (strlen($loc1) == 4) $loc1 .= 'MM';
        if (strlen($loc2) == 4) $loc2 .= 'MM';

        if (!$this->valid_locator($loc1) || !$this->valid_locator($loc2)) {
            return 0;
        }

        $l1 = $this->loc_to_latlon($loc1);
        $l2 = $this->loc_to_latlon($loc2);

        $co = cos($l1[1] - $l2[1]) * cos($l1[0]) * cos($l2[0]) + sin($l1[0]) * sin($l2[0]);
        $ca = atan2(sqrt(1 - $co*$co), $co);



        switch ($measurement_base) {
            case 'M':
                return round(6371*$ca/1.609344);
            case 'K':
                return round(6371*$ca);
            case 'N':
                return round(6371*$ca/1.852);
            default:
                return round(6371*$ca);
        }
    }
}