<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Distances_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_distances($postdata)
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
        }
        else {
            $this->db->where('col_band', $postdata['band']);
        }
        $this->db->where('station_id', $station_id);
        $dataarrayata = $this->db->get($this->config->item('table_name'));
        $this->plot($dataarrayata->result_array(), $gridsquare);
    }

    // This functions takes query result from the database and extracts grids from the qso,
    // then calculates distance between homelocator and locator given in qso.
    // It builds an array, which has 50km intervals, then inputs each length into the correct spot
    // The function returns a json-encoded array.
    function plot($qsoArray, $gridsquare) {
        $stationgrid = strtoupper($gridsquare[0]);              // We use only the first entered gridsquare from the active profile
        if (strlen($stationgrid) == 4) $stationgrid .= 'MM';    // adding center of grid if only 4 digits are specified

        if (!$this->valid_locator($stationgrid)) {
            header('Content-Type: application/json');
            echo json_encode(array('Error' => 'Error. There is a problem with the gridsquare set in your profile!'));
        }
        else {
            // Making the array we will use for plotting, we save occurrences of the length of each qso in the array
            $j = 0;
            for ($i = 0; $j < 20000; $i++) {
                $dataarray[$i]['dist'] =  $j . 'km - ' . ($j + 50) . 'km';
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
                $bearingdistance = $this->bearing_dist($stationgrid, $qso['grid']);     // Calculates distance based on grids
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
                echo json_encode($data);
            }
            else {
                header('Content-Type: application/json');
                echo json_encode(array('Error' => 'No qsoes to plot found'));
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

    function bearing_dist($loc1, $loc2) {
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

        return round(6371*$ca);
    }
}