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
        $message = $this->input->post('message');
        $subject = $this->input->post('subject');
        $to = $this->input->post('to');
        $cc = $this->input->post('cc');
        $bcc = $this->input->post('bcc');
        $from = $this->input->post('from');
        $upload_dir = BASEPATH.'../assets/attachments/';
        // Getting attachement files from $_FILES to our server for attaching the file to email
//        $config_file['upload_path'] = $upload_dir;
//        $config_file['remove_spaces'] = TRUE;
//        $this->upload->initialize($config_file);
//        $attachmentfile = $this->upload->do_upload('amartest') ? 1 : $this->upload->display_errors();
//        pr($this->upload->data());
        if($_FILES){
            $file_key = array_keys($_FILES);
            foreach($file_key as $filename){
                $uploadedfile = $_FILES[$filename];
                @copy($uploadedfile['tmp_name'], $upload_dir.$uploadedfile['name']);
                $attachmentfile[] = $upload_dir.$uploadedfile['name'];
            }
        }
        
        // Email sending configuration
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.googlemail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'amar.provab@gmail.com';
        $config['smtp_pass']    = 'amar@Provab';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // text or html
        $config['validation'] = TRUE; // bool whether to validate email or not 
        $this->email->initialize($config);
        $this->email->from($from ? $from : $config['smtp_user'], 'Administrator');
        $this->email->to($to);
        if($cc)
            $this->email->cc($cc);
        if($bcc)
            $this->email->bcc($bcc);
        $this->email->subject($subject);
        $this->email->message($message);
        if($attachmentfile){
            foreach($attachmentfile as $filename)
                $this->email->attach($filename);
        }
        echo $this->email->send() ? 'Your mail has sent successfully <br/> <script type="text/javascript">setTimeout(function(){window.location.href="'.  base_url().'index.php/'.strtolower(__CLASS__).'";}, 3000)</script>' : $this->email->print_debugger();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */