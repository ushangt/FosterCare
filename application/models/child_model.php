<?php

class Child_model extends CI_Model {

    public $error = "";

    function addChild($childData){
    	
    	$result = $this->db->insert('child', $childData); 
    	if($result)
    		return  $this->db->insert_id();
    	else
    		return FALSE;

    }

    function getAllActiveChildren(){
    	$result = $this->db->query("SELECT c.id, c.name as child_name, c.age, c.sex, c.image, c.adopted,
    									   m.medical_condition, r.race
    								FROM child c
    								INNER JOIN medical_condition m ON c.medical_condition = m.id
    								INNER JOIN race r ON c.race = r.id
    								WHERE c.status = 1");
    	if($result && $result->num_rows() > 0){
			return $result->result_array();
		}
		else{			
			return FALSE;
		}
    }

    function getAllNonAdoptedChildren(){
    	$result = $this->db->query("SELECT c.id, c.name as child_name, c.age, c.sex, c.image, c.adopted,
    									   m.medical_condition, r.race
    								FROM child c
    								INNER JOIN medical_condition m ON c.medical_condition = m.id
    								INNER JOIN race r ON c.race = r.id
    								WHERE c.status = 1
    								AND c.adopted = 0");
    	if($result && $result->num_rows() > 0){
			return $result->result_array();
		}
		else{			
			return FALSE;
		}
    }

    function getChildById($child_id)
    {
    	$result = $this->db->query("SELECT * FROM child WHERE id = ".$child_id);
    	if($result && $result->num_rows() > 0){
			return $result->result_array();
		}
		else{			
			return FALSE;
		}
    }

    function editChild($childData,$id){
    	
    	$this->db->where('id',$id);
    	$result = $this->db->update('child', $childData); 
    	if($result)
    		return  TRUE;
    	else
    		return FALSE;
    }

    function getAllPendingDonations(){
    	$result = $this->db->query("SELECT d.id, u.name as parent_name, c.name as child_name, d.reason
    								FROM donation d
    								INNER JOIN user u ON u.id = d.parent_id
    								INNER JOIN child c ON c.id = d.child_id 
    								WHERE d.status = 0");
    	if($result && $result->num_rows() > 0){
			return $result->result_array();
		}
		else{			
			return FALSE;
		}
    }

    function approveRejectDonation($donationId, $status)
    {
    	$this->db->trans_start();
    	$data = array("status" => $status);
    	$this->db->where('id',$donationId);    	
    	$result = $this->db->update('donation', $data); 
    	
		if($status == 1)
		{
    		$query = $this->db->query("SELECT child_id FROM donation WHERE id = ".$donationId);
    		if($query && $query->num_rows() > 0)
    		{
    			$child_id = $query->result_array();    			
    			$array = array("status" => 1);
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

}