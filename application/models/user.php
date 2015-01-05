<?php

/**
 * 
 * 
 * @package 	tv_1
 * @subpackage	application/models 
 * @category 	Authentication
 * @author 		Sawood
 * @link 		http://localhost/tv_1/home
 */
class User extends CI_Model{
	
	/** 
	 * Validates the login details and returns the username and password
	 * @access public
	 * @param  string $username username to login in the front end of the site
	 * @param  string $password password to login in the front end of the site
	 * @return DB result with id,username & password 
	 */
	public function login($username, $password)
	{		
		$this->db->select('id,username,password');
		$this->db->from('users');
		$this->db->where('username',$username);
		$this->db->where('password', MD5($password));
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}	
	}
	
	public function get_class(){
		
	$this->db->select('id,class_type');	
	$query = $this->db->get('class_type');
		
		if($query->result()){
			return $query->result_array();
		}else{
			return false;
		}		
	}
	
	public function get_airlines(){
		
	$this->db->select('id,airlines');	
	$query = $this->db->get('airlines_name');
		
		if($query->result()){
			return $query->result_array();
		}else{
			return false;
		}		
	}
	
	public function get_cities(){
		
	$this->db->select('CityId,Destination');	
	$query = $this->db->get('hotel_cities');

		if($query->result()){
			return $query->result_array();
		}else{
			return false;
		}		
	}

	public function get_countries(){

	$this->db->distinct();
	$this->db->select('Country');	
	$query = $this->db->get('hotel_cities');
			
		if($query->result()){
			return $query->result_array();
		}else{
			return false;
		}		
	}
	
	public function get_cityid($city){		
		$this->db->select('CityId,Destination');	
		$this->db->where('Destination', $city); 		
		$query = $this->db->get('hotel_cities');
		
		if($query->result()){
			$result = $query->result_array();
			return $result[0];
		}else{
			return false;
		}
	}
	
	public function get_autoload($city_name){
		
		$this->db->select('Destination');	
		$this->db->like('Destination', $city_name); 
		$query = $this->db->get('hotel_cities');
		
		if($query->result()){
			$result = $query->result_array();
			foreach($result as $row){
				echo $row['Destination'];				
			}
		}else{
			return false;
		}
		
		
	}
}
