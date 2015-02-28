<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CalendarPractice extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->library('session');
        }
        
	public function index(){
         $this->load->model('calendarpracticemodel');
         $this->calendarpracticemodel->get_event_calendar();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */