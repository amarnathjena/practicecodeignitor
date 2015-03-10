<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JquerySearching extends CI_Controller {

        function __construct() {
            parent::__construct();
        }
        
	public function index(){
            $r = $this->db->from('users');
            $data['result'] = $r->get()->result();
            $data['sql'] = $r->last_query();
            $this->load->view("jquerysearching", $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */