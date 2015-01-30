<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
        }
	public function index(){
             // Getting logged in user's id
            $userdata['msg'] = $this->session->userdata("msg");
            $this->session->unset_userdata("msg");
            if($this->uid){
                $this->session->set_userdata(array(
                'msg'=>$userdata['msg']
                ));
                redirect("login/listing");
            }else{
                $this->load->view('header', $userdata);
                $this->load->view('loginform');
            }
	}
	public function registrationform(){
            $id = $this->input->post('user'); // For editing other users data
            if(!$id)
                $id = $this->session->userdata('id'); // For editing own data
            
            if($id){
                $this->load->model('loginmodel');
                $userdata = $this->loginmodel->get_user($id);
            }
            $msg['msg'] = $this->session->userdata('msg');
            if($msg['msg'])
                $userdata['msg'] = $msg['msg'];
            $this->session->unset_userdata("msg");
            
            // If fancybox will come then we needs to hide header's top data(Example : Welcome user, etc)
            if($this->input->post('noheader'))
                $userdata->noheader = 1;
            
            $this->load->view('header', $userdata);
            $this->load->view('registrationform');
	}
	        
        public function registration(){
            $this->load->model('loginmodel');
                $userdata["name"]   = $this->input->post('name'); // please read the below note
                if($this->input->post('username'))
                    $userdata["username"] = $this->input->post('username');
                if($this->input->post('password'))
                    $userdata["password"]    = $this->input->post('password');
                $userdata["dob"]    = date("Y-m-d", strtotime($this->input->post('dob')));
                $userdata["permanent_address"]    = $this->input->post('permanent_address');
                $userdata["current_address"]    = $this->input->post('current_address');
                $userdata["email"]    = $this->input->post('email');
                $userdata["mobile"]    = $this->input->post('mobile');
                $userdata["organization"]    = $this->input->post('organization');
                $userdata["department"]    = $this->input->post('department');
                $userdata["designation"]   = $this->input->post('designation');
            if($this->input->post('id')){
                $userdata["id"] = $this->input->post('id');
            }
            if($this->regFormValidation($userdata)){
                $this->loginmodel->insert_user('users', $userdata);
                if(!$userdata["id"])
                    redirect("login");
                else{
                    $this->session->set_userdata(array(
                        'msg'=>"Successfully updated data."
                    ));
                    redirect("login/listing");
                }
            }else{
                $this->load->view('header', $userdata);
                $this->load->view("registrationform");
            }
        }
        
        function logincheck(){
            $uname = $this->input->post('username');
            $pass = $this->input->post('password');
            
            // Loading model class
            $this->load->model('loginmodel');
            if( $uname && $pass && $this->loginmodel->validate_user($uname,$pass)) {
                $this->session->set_userdata(array(
                'msg'=>"You have successfully logged in."
                ));
            }else
                $this->session->set_userdata(array(
                'msg'=>"Failed to logged in."
                ));
            redirect("login");
        }
        
        function logout(){
            $this->session->unset_userdata("id");
            $this->session->set_userdata(array(
                'msg'=>"Successfully Logout"
                ));
            redirect("login");
        }
        
        function listing($qstart){
//            $config['enable_query_strings'] = TRUE;
//            $this->uri->segment(3);
            
            /** With the above code, we can be used independently to get url data and if function 
            have argument variable then the 3rd segment of url/address bar will be available in the 
            first argument as per codeigniter **/
                        
            
            /***** Codes start for Pagination after loading pagination library
            Through these codes we can just show the number of links for pagination but not records. In below
            code we are showing the records.
             */
            $qstart = $qstart ? $qstart : 0;
            $config['base_url'] = LBL_SITE_URL.'/index.php/'.strtolower(__CLASS__).'/'.__FUNCTION__;
            $this->load->model('loginmodel');
            $id = $this->session->userdata('id');
            $totrows = count($this->loginmodel->get_user($id, 1));
            $config['cur_tag_open'] = "<a class='page_current'>";
            $config['cur_tag_close'] = "</a>";
            $config['total_rows'] = $totrows;
            $config['per_page'] = 3;
            //$config['uri_segment'] = 4;// it will be times when pagination link will be change to $config['base_url'].'/page'
            $order_by = array('name ASC');
            $group_by = array();
            $this->pagination->initialize($config); 
            // Codes end for pagination then we need to add links to view (echo $this->pagination->create_links();) ******
            
            if($this->uid){
                $msg['msg'] = $this->session->userdata('msg');
                $this->session->unset_userdata("msg");
                
                // Here is code for showing the number of required results/records in pagination page.
                $data['lists'] = $this->loginmodel->pg_get_user('users', array("id != '$id'"), $order_by, $group_by, $qstart, $config['per_page']);
                
                $msg = array_merge($data, $msg);
                $userdata['name'] = $this->session->userdata("name");
                $this->load->view('header', $msg);
                $this->load->view('userlisting', $msg);
            }else{
                redirect('login');
            }
        }
        
        function changepassword(){
            if($this->session->userdata('id')){
                $userdata['name'] = $this->session->userdata("name");                
                $this->load->view('header', $userdata);
                $this->load->view("passwordform");
            }else{
                redirect('login');
            }
        }
        
        function chngpwd(){
            $data["currentpassword"] = $this->input->post("currentpassword");
            $data["newpassword"] = $this->input->post("newpassword");
            if($data["newpassword"] == $this->input->post("confirmpassword")){
                $data["id"] = $this->session->userdata("id");
                $this->load->model("loginmodel");
                if($this->session->userdata('id')){
                    if($this->loginmodel->changePassword($data)){
                        $this->session->set_userdata(array('msg'=>"Successfully changed password"));
                        redirect("login/listing");
                    }else{
                        $this->session->set_userdata(array('msg'=>"Failed to change password"));
                        redirect("login/changepassword");
                    }
                }else{
                    redirect('login');
                }
            }else{
                $this->session->set_userdata(array('msg'=>"New Password and Confirm Password mismatched"));
                redirect('login/confirm');    
            }
        }
        
        function deleteUser(){
             $this->load->model("loginmodel");
             if($this->session->userdata('id')){
                $this->loginmodel->deleteUser($this->input->post('id'));
             }
             echo "success";
        }
        
        function regFormValidation($data){
            $reqKeys = array("name", "username", "password", "mobile");
            $validateKeys = array("email"=>"/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/", "mobile"=>"/^[\d]{1,10}$/");
            foreach($reqKeys as $val){
                if(!$data[$val]){
                    $userdata["msg"] = "Error in data validation. Please insert field {$val}.";
                    return false;
                }elseif(array_key_exists ($val, $validateKeys) && $data[$val]){
                    if(!preg_match($validateKeys[$val], $data[$val])){
                        $userdata["msg"] = "Error in data validation. Please give valid data for $val.";
                        return false;
                    }
                }
            }
            return true;
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */