<?php

class User_model extends CI_Model {

    public $error = "";

    function checkLogin($params){

    	$result 	= 	$this->db->query('SELECT * FROM user
									WHERE username = "'.$params['username'].'"
									AND password = MD5("'.$params['password'].'")');

    	if($result && $result->num_rows() > 0){
			return $result->result_array();
		}
		else{			
			return FALSE;
		}
    }


    function registerParent($params){

    	unset($params['password_again']);
    	$params['password'] = md5($params['password']);
    	$result = $this->db->insert('user', $params); 
    	if($result)
    		return  $this->db->insert_id();
    	else
    		return FALSE;

    }

    function getUserById($id){
    	$result 	= 	$this->db->query('SELECT * FROM user
										  WHERE id = '.$id);

    	if($result && $result->num_rows() > 0){
			return $result->result_array();
		}
		else{			
			return FALSE;
		}
    }

    function getMedicalCondition(){
    	$result 	= 	$this->db->query('SELECT * FROM medical_condition');

    	if($result && $result->num_rows() > 0){
			return $result->result_array();
		}
		else{			
			return FALSE;
		}
    }

    function getRace(){
    	$result 	= 	$this->db->query('SELECT * FROM race');

    	if($result && $result->num_rows() > 0){
			return $result->result_array();
		}
		else{			
			return FALSE;
		}
    }

    function getMaritalStatus(){
        $result     =   $this->db->query('SELECT * FROM marital_status');

        if($result && $result->num_rows() > 0){
            return $result->result_array();
        }
        else{           
            return FALSE;
        }
    }

    function donateChild($child,$reason,$parentId){

    	$this->db->trans_start();

    	$result = $this->db->insert('child',$child);
        $child_id = $this->db->insert_id();
        if($result){
        	$array = array("child_id" 	=> 	$child_id,
        				   "parent_id"	=>	$parentId,
        				   "reason"		=>	$reason);
        	$this->db->insert('donation',$array);
        	$this->db->trans_complete();
        	if($this->db->trans_status() === FALSE) {
        		return FALSE;
        	}      	
        	return TRUE;
        }
        else{
        	return FALSE;
        }       
    }

    function getAllDonationRequestsByUser($userId)
    {
    	$result 	= 	$this->db->query('SELECT d.reason,d.status,c.name as child_name FROM donation d
    									  INNER JOIN child c
    									  ON c.id = d.child_id 
    									  WHERE parent_id = '.$userId);

    	if($result && $result->num_rows() > 0){
			return $result->result_array();
		}
		else{			
			return FALSE;
		}
    }

    function checkParentFinancials($parentId)
    {
        $result = $this->db->query("SELECT * FROM adopting_parent WHERE id = ".$parentId);
        if($result && $result->num_rows() > 0){
            return $result->result_array();
        }
        else{           
            return FALSE;
        }
    }

    function addPersonalInfo($data)
    {
        $result = $this->db->insert('adopting_parent', $data);         
        if($result)
            return  TRUE;
        else
            return FALSE;
    }

    function editPersonalInfo($data,$parent_id)
    {
        $this->db->where('id',$parent_id);
        $result = $this->db->update('adopting_parent', $data); 
        if($result)
            return  TRUE;
        else
            return FALSE;
    }

    function setUpMeeting($data)
    {
        $result = $this->db->insert('meeting',$data);
        if($result)
            return  TRUE;
        else
            return FALSE;
    }

    function getAllPastMeetingsForUser($parent_id)
    {
        $result = $this->db->query("SELECT m.id, m.meeting_date, m.meeting_time, m.is_approved, c.name as child_name
                                    FROM meeting m
                                    INNER JOIN child c
                                    ON c.id = m.child_id
                                    WHERE m.parent_id = ".$parent_id);
        if($result && $result->num_rows() > 0){
            return $result->result_array();
        }
        else{           
            return FALSE;
        }
    }

    function getAllAdoptableChildren($parent_id)
    {
        $result = $this->db->query("SELECT c.id, c.name, c.age, c.sex,  c.image
                                    FROM child c
                                    INNER JOIN meeting m
                                    ON m.child_id = c.id
                                    AND m.parent_id = ".$parent_id."                               
                                    WHERE m.is_approved = 1
                                    AND c.adopted = 0
                                    AND c.status = 1
                                    AND m.id NOT IN (SELECT m.id FROM adoption a, meeting m 
                                                     WHERE a.child_id = m.child_id
                                                     AND a.adopter = m.parent_id)");
        if($result && $result->num_rows() > 0){
            return $result->result_array();
        }
        else{           
            return FALSE;
        }
    }

    function adoptChild($data)
    {
        $result = $this->db->insert('adoption',$data);
        if($result)
            return  TRUE;
        else
            return FALSE;
    }

    function getAllPastAdoptionsForUser($parent_id)
    {
        $result = $this->db->query("SELECT a.id, a.is_legally_verified, c.name as child_name, c.image 
                                    FROM adoption a
                                    INNER JOIN child c
                                    ON c.id = a.child_id
                                    WHERE a.adopter = ".$parent_id);
        if($result && $result->num_rows() > 0){
            return $result->result_array();
        }
        else{           
            return FALSE;
        }
    }

    function getAllPendingMeetingRequests()
    {
        $result = $this->db->query("SELECT m.id, m.meeting_date, m.meeting_time, c.name as child_name, u.name as parent_name 
                                    FROM meeting m
                                    INNER JOIN child c ON c.id = m.child_id
                                    INNER JOIN user u ON u.id = m.parent_id
                                    WHERE is_approved = 0 ");
        if($result && $result->num_rows() > 0){
            return $result->result_array();
        }
        else{           
            return FALSE;
        }
    }

    function approveRejectMeeting($meeting_id,$status)
    {
        $array = array('is_approved' => $status);
        $this->db->where('id',$meeting_id);        
        $result = $this->db->update('meeting',$array);
        if($result)
            return TRUE;
        else
            return FALSE;
    }

    function getAllPendingAdoptionRequests()
    {
        $result = $this->db->query("SELECT a.id, c.name as child_name, u.name as parent_name 
                                    FROM adoption a
                                    INNER JOIN child c ON c.id = a.child_id
                                    INNER JOIN user u ON u.id = a.adopter
                                    WHERE a.is_legally_verified = 0 ");
        if($result && $result->num_rows() > 0){
            return $result->result_array();
        }
        else{           
            return FALSE;
        }
    }

    function rejectAdoption($adoption_id)
    {
        $array = array('is_legally_verified' => -1);
        $this->db->where('id',$adoption_id);        
        $result = $this->db->update('adoption',$array);
        if($result)
            return TRUE;
        else
            return FALSE;
    }

    function approveAdoption($adoption_id)
    {
        $this->db->trans_start();

        $array = array('is_legally_verified' => 1);
        $this->db->where('id',$adoption_id);
        $result = $this->db->update('adoption',$array);
        if($result)
        {
            $query = $this->db->query("SELECT child_id FROM adoption WHERE id = ".$adoption_id);
            if($query && $query->num_rows() > 0)
            {
                $child_id = $query->result_array();             
                $array = array("adopted" => 1);
                $this->db->where('id',$child_id[0]['child_id']);                
                $this->db->update('child',$array);                                                                  
            }
            else
                return FALSE;
        }

        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE)
            return FALSE;
        else
            return TRUE;
    }

    function getAllParents()
    {
        $result = $this->db->query("SELECT u.id, u.name, u.email, u.contact_number, u.role_id FROM user u WHERE u.role_id != 1");
        if($result && $result->num_rows() > 0){
            return $result->result_array();
        }
        else{           
            return FALSE;
        }
    }

    function getFinancialsForUser($parent_id)
    {
        $result = $this->db->query("SELECT u.id, u.name, u.email, u.contact_number, a.is_employed, a.salary, m.marital_status, a.no_of_children
                                    FROM user u 
                                    LEFT JOIN adopting_parent a ON u.id = a.id
                                    LEFT JOIN marital_status m ON m.id = a.marital_status 
                                    WHERE u.id = ".$parent_id);
        if($result && $result->num_rows() > 0){
            return $result->result_array();
        }
        else{           
            return FALSE;
        }
    }
}