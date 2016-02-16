<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	function Front(){
		parent::__construct();

		//Load all models
		$this->load->model('user_model');		
		$this->load->model('child_model');	
		//Load Helpers
		
	}
	
	public function index()
	{
		if($this->session->userdata('USER_ID')){
			switch($this->session->userdata('USER_ID')){
				case 1:
					redirect(base_url().'admin/dashboard');
					break;
				case 2:
					redirect(base_url().'front/adopting_parent');
					break;
				case 3:
					redirect(base_url().'front/biological_parent');
					break;
			}
		}
		$this->load->view('login');
	}	

	public function action_login()
	{
		$form_data = $this->input->post();
		$result = $this->user_model->checkLogin($form_data);
		if($result)
		{
			//print_r($result);die;
			$this->session->set_userdata('USER_ID', $result[0]['id']);
			$this->session->set_userdata('ROLE_ID', $result[0]['role_id']);
			$this->session->set_userdata('NAME', $result[0]['name']);
			switch($result[0]['role_id']){
				case 1:
					redirect(base_url().'admin/dashboard');
					break;
				case 2:
					redirect(base_url().'front/adopting_parent');
					break;
				case 3:
					redirect(base_url().'front/biological_parent');
					break;
			}
		}
		else
		{
			redirect(base_url('?error=1'));
		}
	}

	public function register()
	{
		$this->load->view('front/register');
	}

	public function action_register()
	{
		$form_data = $this->input->post();
		$result = $this->user_model->registerParent($form_data);
		if($result)
		{
			$this->session->set_userdata('USER_ID', $result);
			$this->session->set_userdata('ROLE_ID', $form_data['role_id']);
			$this->session->set_userdata('NAME', $form_data['name']);
			if($form_data['role_id'] == 2)
				redirect(base_url().'front/adopting_parent');
			else
				redirect(base_url().'front/biological_parent');
		}
		else
		{
			redirect(base_url('front/register?error=1'));
		}
	}


	public function adopting_parent()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] = 'Dashboard';
		$data['parent_financials'] = $this->user_model->checkParentFinancials($this->session->userdata('USER_ID'));
		$data['view_file'] = 'front/adopting_parent/dashboard';
		$this->load->view('admin/templates/template',$data);
	}

	public function biological_parent()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] = 'Dashboard';
		$data['view_file'] = 'front/biological_parent/dashboard';
		$this->load->view('admin/templates/template',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function donation()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] = 'Create Donation Request';
		$data['view_file'] = 'front/biological_parent/donation';
		$data['medical'] = $this->user_model->getMedicalCondition();
		$data['race'] = $this->user_model->getRace();
		$this->load->view('admin/templates/template',$data);
	}

	public function action_donation()
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
			redirect(base_url().'front/donation');
		}
		else
		{
			$data = $this->upload->data();
			$post['image'] = $data['file_name'];
			$post['status'] = 0;
			$reason = $post['reason'] ;
			unset($post['reason']);
			$result = $this->user_model->donateChild($post,$reason,$this->session->userdata('USER_ID'));
			if($result){
				$this->session->set_flashdata('success', SUCCESS_MESSAGE);
				redirect(base_url().'front/donation');
			}
			else{
				$this->session->set_flashdata('error', ERROR_MESSAGE);
				redirect(base_url().'front/donation');
			}
		}
	}

	public function past_donations()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] 	=	'Past Donation Requests';
		$data['view_file'] 	=	'front/biological_parent/past_donations';
		$data['requests']	=	$this->user_model->getAllDonationRequestsByUser($this->session->userdata('USER_ID'));
		$this->load->view('admin/templates/template',$data);
	}

	public function personal_details()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] 	=	'Personal Details';
		$data['view_file'] 	=	'front/adopting_parent/personal_details';
		$data['marital']	=	$this->user_model->getMaritalStatus();
		$data['details']	=	$this->user_model->checkParentFinancials($this->session->userdata('USER_ID'));	
		$this->load->view('admin/templates/template',$data);
	}

	public function action_add_personal_details()
	{		
		$data = $this->input->post();
		$data['id'] = $this->session->userdata('USER_ID');
		$result = $this->user_model->addPersonalInfo($data);
		if($result)
			$this->session->set_flashdata('success', SUCCESS_MESSAGE);
		else
			$this->session->set_flashdata('error', ERROR_MESSAGE);
		redirect(base_url().'front/personal_details');
	}

	public function action_edit_personal_details()
	{
		$data = $this->input->post();
		$result = $this->user_model->editPersonalInfo($data,$this->session->userdata('USER_ID'));
		if($result)
			$this->session->set_flashdata('success', SUCCESS_MESSAGE);
		else
			$this->session->set_flashdata('error', ERROR_MESSAGE);
		redirect(base_url().'front/personal_details');
	}

	public function search_child()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] = 'Search Child';
		$data['view_file'] = 'front/adopting_parent/search_child';
		$data['children'] = $this->child_model->getAllNonAdoptedChildren();		
		$this->load->view('admin/templates/template',$data);
	}

	public function set_meeting()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] = 'Setup a Meeting';
		$data['view_file'] = 'front/adopting_parent/set_meeting';
		$data['child_id']  = $this->input->get('child_id');	
		$this->load->view('admin/templates/template',$data);		
	}

	public function action_set_meeting()
	{
		$data = $this->input->post();
		$data['parent_id'] = $this->session->userdata('USER_ID');
		$result = $this->user_model->setUpMeeting($data);
		if($result)
			$this->session->set_flashdata('success', SUCCESS_MESSAGE);
		else
			$this->session->set_flashdata('error', ERROR_MESSAGE);
		redirect(base_url().'front/search_child');
	}

	public function past_meetings()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] = 'Past Meetings';
		$data['view_file'] = 'front/adopting_parent/past_meetings';
		$data['meeting'] = $this->user_model->getAllPastMeetingsForUser($this->session->userdata('USER_ID'));		
		$this->load->view('admin/templates/template',$data);
	}

	public function adoption()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] = 'Create Adoption Request';
		$data['view_file'] = 'front/adopting_parent/adoption';
		$data['adoption'] = $this->user_model->getAllAdoptableChildren($this->session->userdata('USER_ID'));		
		$this->load->view('admin/templates/template',$data);
	}

	function action_adopt()
	{
		$data['child_id'] = $this->input->get('child_id');
		$data['adopter']  = $this->session->userdata('USER_ID');
		$result = $this->user_model->adoptChild($data);
		if($result)
			$this->session->set_flashdata('success', SUCCESS_MESSAGE);
		else
			$this->session->set_flashdata('error', ERROR_MESSAGE);
		redirect(base_url().'front/adoption');
	}

	public function past_adoptions()
	{
		if(!$this->session->userdata('USER_ID')){
            redirect(base_url());
        }
		$data['page_name'] = 'Past Adoptions';
		$data['view_file'] = 'front/adopting_parent/past_adoptions';
		$data['adoption'] = $this->user_model->getAllPastAdoptionsForUser($this->session->userdata('USER_ID'));		
		$this->load->view('admin/templates/template',$data);
	}


}
