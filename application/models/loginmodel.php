<?php

class LoginModel extends CI_Model{
    var $details;
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function insert_user($tbl, $data){
        $id = $data['id'];
        if($data['password'])
            $data['password'] = md5($data['password']);
        if(!$id)
            $this->db->insert($tbl, $data);
        else{
            $this->db->where('id', $id);
            unset($data['id']);
            $this->db->update($tbl, $data);
        }
    }
    
    function validate_user($username, $password){
        $this->db->from('user');
        $this->db->where('username',$username );
        $this->db->where( 'password', md5($password));
        $login = $this->db->get()->result();
        if (is_array($login) && count($login)) {
            $this->details = $login[0];
            
            // Setting user's data to session
            $this->session->set_userdata( array(
                'id'=>$this->details->id,
                'name'=> $this->details->name,
                'username'=> $this->details->username,
                'isLoggedIn'=>true,
                )
                );
            return true;
        }
        return false;
    }
    function get_user($id, $all=0){
        $this->db->from('user');
        if(!$all){
            $this->db->where('id',$id);
            $login = $this->db->get()->result();
            if (is_array($login) && count($login)) {
                return $login[0];
            }
            return false;
        }else{
            $this->db->where('id !=',$id);
            $login = $this->db->get()->result();
            if (is_array($login) && count($login)) {
                return $login;
            }
            return false;
        }
        
    }
    
    function changePassword($data){
        $this->db->where('id',$data['id']);
        $this->db->where( 'password', md5($data['currentpassword']));
        unset($data['currentpassword']);
        unset($data['id']);
        $data['password'] = md5($data['newpassword']);
        unset($data['newpassword']);
        if($this->db->update("user", $data))
            return true;
        else
            return false;
    }
    
    function deleteUser($id){
        $this->db->from('user');
        $this->db->where('id',$id);
        echo $this->db->delete("user", $data);
    }
}
?>
