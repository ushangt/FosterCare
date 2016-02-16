<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function Admin(){
		parent::__construct();

		//Load all models
		$this->load->model('user_model');	
		$this->load->model('child_model');	

		//Load Helpers
		
	}

	public function dashboard()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] = 'Dashboard';
		$data['view_file'] = 'admin/dashboard';
		$this->load->view('admin/templates/template',$data);
	}

	public function add_child()
	{
		$data['page_name'] = 'Add Child';
		$data['view_file'] = 'admin/add_child';
		$data['medical'] = $this->user_model->getMedicalCondition();
		$data['race'] = $this->user_model->getRace();
		$this->load->view('admin/templates/template',$data);
	}

	public function action_add_child()
	{
		$post= $this->input->post();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			//load the page again and show errors
			$this->session->set_flashdata('error', $error);			
		}
		else
		{
			$data = $this->upload->data();
			$post['image'] = $data['file_name'];					
			unset($post['child_id']);
			$result = $this->child_model->addChild($post);
			if($result){
				$this->session->set_flashdata('success', SUCCESS_MESSAGE);				
			}
			else{
				$this->session->set_flashdata('error', ERROR_MESSAGE);				
			}
		}
		redirect(base_url().'admin/add_child');
	}

	public function manage_child()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] = 'Manage Children';
		$data['view_file'] = 'admin/manage_child';
		$data['children'] = $this->child_model->getAllActiveChildren();		
		$this->load->view('admin/templates/template',$data);
	}

	public function edit_child()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$child_id  = $this->input->get('child_id');
		$data['child'] = $this->child_model->getChildById($child_id)[0];		
		$data['page_name'] = 'Edit Child';
		$data['view_file'] = 'admin/add_child';
		$data['medical'] = $this->user_model->getMedicalCondition();
		$data['race'] = $this->user_model->getRace();
		$this->load->view('admin/templates/template',$data);
	}

	public function action_edit_child()
	{
		$post= $this->input->post();
		//print_r($post);die;
		$child_id = $post['child_id'];
		unset($post['child_id']);
		if($_FILES['userfile']['size'] > 0)
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '0';		
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$error = $this->upload->display_errors();
				//load the page again and show errors
				$this->session->set_flashdata('error', $error);	
				redirect(base_url().'admin/edit_child?child_id='.$child_id);		
			}
			else
			{
				$data = $this->upload->data();
				$post['image'] = $data['file_name'];
			}
		}		
											
		$result = $this->child_model->editChild($post,$child_id);
		if($result){
			$this->session->set_flashdata('success', SUCCESS_MESSAGE);				
		}
		else{
			$this->session->set_flashdata('error', ERROR_MESSAGE);				
		}
		
		redirect(base_url().'admin/edit_child?child_id='.$child_id);	
	}

	public function manage_donation_requests()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] = 'Approve/Reject Donation Requests';
		$data['view_file'] = 'admin/manage_donation_requests';
		$data['requests']  = $this->child_model->getAllPendingDonations();		
		$this->load->view('admin/templates/template',$data);
	}

	public function action_approve_donation()
	{
		$donation_id = $this->input->get('donation_id');
		$result = $this->child_model->approveRejectDonation($donation_id,1);
		if($result){
			$this->session->set_flashdata('success', SUCCESS_MESSAGE);				
		}
		else{
			$this->session->set_flashdata('error', ERROR_MESSAGE);				
		}
		redirect(base_url().'admin/manage_donation_requests');
	}

	public function action_reject_donation()
	{
		$donation_id = $this->input->get('donation_id');
		$result = $this->child_model->approveRejectDonation($donation_id,-1);
		if($result){
			$this->session->set_flashdata('success', SUCCESS_MESSAGE);				
		}
		else{
			$this->session->set_flashdata('error', ERROR_MESSAGE);				
		}
		redirect(base_url().'admin/manage_donation_requests');
	}

	public function manage_meetings()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] = 'Manage Meeting Requests';
		$data['view_file'] = 'admin/manage_meetings';
		$data['requests']  = $this->user_model->getAllPendingMeetingRequests();		
		$this->load->view('admin/templates/template',$data);
	}

	public function action_approve_meeting()
	{
		$meeting_id = $this->input->get('meeting_id');
		$result = $this->user_model->approveRejectMeeting($meeting_id,1);
		if($result){
			$this->session->set_flashdata('success', SUCCESS_MESSAGE);				
		}
		else{
			$this->session->set_flashdata('error', ERROR_MESSAGE);				
		}
		redirect(base_url().'admin/manage_meetings');
	}

	public function action_reject_meeting()
	{
		$meeting_id = $this->input->get('meeting_id');
		$result = $this->user_model->approveRejectMeeting($meeting_id,-1);
		if($result){
			$this->session->set_flashdata('success', SUCCESS_MESSAGE);				
		}
		else{
			$this->session->set_flashdata('error', ERROR_MESSAGE);				
		}
		redirect(base_url().'admin/manage_meetings');
	}

	public function manage_adoptions()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] = 'Manage Adoption Requests';
		$data['view_file'] = 'admin/manage_adoptions';
		$data['requests']  = $this->user_model->getAllPendingAdoptionRequests();		
		$this->load->view('admin/templates/template',$data);
	}

	public function action_approve_adoption()
	{
		$adoption_id = $this->input->get('adoption_id');
		$result = $this->user_model->approveAdoption($adoption_id);
		if($result){
			$this->session->set_flashdata('success', SUCCESS_MESSAGE);				
		}
		else{
			$this->session->set_flashdata('error', ERROR_MESSAGE);				
		}
		redirect(base_url().'admin/manage_adoptions');
	}

	public function action_reject_adoption()
	{
		$adoption_id = $this->input->get('adoption_id');
		$result = $this->user_model->rejectAdoption($adoption_id);
		if($result){
			$this->session->set_flashdata('success', SUCCESS_MESSAGE);				
		}
		else{
			$this->session->set_flashdata('error', ERROR_MESSAGE);				
		}
		redirect(base_url().'admin/manage_adoptions');
	}

	public function manage_parent()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] = 'Manage Parents';
		$data['view_file'] = 'admin/manage_parent';
		$data['parents'] = $this->user_model->getAllParents();		
		$this->load->view('admin/templates/template',$data);
	}

	public function view_finanicals()
	{
		$parent_id = $this->input->get('parent_id');
		$data['financials'] = $this->user_model->getFinancialsForUser($parent_id);
		$data['page_name'] = 'View Financials';
		$data['view_file'] = 'admin/view_financials';	
		$this->load->view('admin/templates/template',$data);

	}

}