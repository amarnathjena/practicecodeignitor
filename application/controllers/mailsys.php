<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL);
ini_set("display_errors", "On");
class Mailsys extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('id'))
            redirect ('login');
    }
    function index(){
        $this->load->view("mailform");
    }
    
    function mailsend(){
        $this->email->from('your@example.com', 'Your Name');
        $this->email->to('someone@example.com');
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();

        echo $this->email->print_debugger();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */