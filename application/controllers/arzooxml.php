<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Arzooxml extends CI_Controller {
    var $username;
    var $password;
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('id'))
            redirect ('login');
        $this->username = "ADD USERNAME";
	$this->password = "ADD PASSWORD";
    }

    public function index() {
        include_once APPPATH."includes/xmlparser.php";
        $this->load->view('arzoo/allforms');
    }
    
    function flight_load(){
        unset($_SESSION['back']);
        unset($_SESSION['EMAILGUEST']);
        $searching_data = array_merge($_POST, $_GET);
        $origin = $searching_data['origin'];
        $ocity_name = explode(",", $origin);
        $dest = $searching_data['destination'];
        $dcity_name = explode(",", $dest);
        $_SESSION['depart_date'] = $searching_data['depart_date'];
        $_SESSION['return_date'] = $searching_data['return_date'];
        $data["searching_data"] = $searching_data; 
        $this->load->view("arzoo/flight_load", $data);
    }

}
