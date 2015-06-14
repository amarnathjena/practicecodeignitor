<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

        var $uid;
        function __construct() {
            parent::__construct();
            // Loading url class manually
            $this->load->helper('url');
            // Loading session class manually and also add encryption key to config for session.
            $this->load->library('session');
            // Loading validation class manually
            $this->load->library('form_validation');
            
            $this->uid = $this->session->userdata('id');
            if(!$this->uid){
               redirect("/"); 
            }
        }
	public function index(){
             $this->load->view("dashboard");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */