<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 
	 *
	 
	 * 
	 */
	public function __construct() {
		parent::__construct();
		
		$this->load->model('Mlogin');
	}

	public function index()
	{
		if(isset($this->session->userdata['logged_in'])){
			redirect('/adm_dashboard/');
		}else{
			$this->load->view('login');
		}
	}

	public function login_process() {

		
		/*$data = array(
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password')
		);
		$result = $this->Mlogin->login($data);*/

		$username = $this->input->post('username');
		$result = $this->Mlogin->login($username);
		
		if($result==FALSE){
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('user', $this->input->post('username'));
			$this->session->set_flashdata('pass', $this->input->post('password'));
			$this->session->set_flashdata('msg', 'Username tidak sesuai');
			redirect('/login/');
		}else{
			
			if(password_verify($this->input->post('password'), $result->password)) {

				
				
				$session_data = array(
				'username' => $result->username,
				'id_login' => $result->id_login,
				'hak_akses' => $result->hak_akses
				);
				// Add user data in session
				$this->session->set_userdata('logged_in', $session_data);
				$alert="<script>toastr['info']('Selamat datang di website RSUD H. Habibie')</script>";
				$this->session->set_flashdata('alert', $alert);
				redirect('/adm_dashboard/');
			}else {
				$this->session->set_flashdata('alert', 'danger');
				$this->session->set_flashdata('user', $this->input->post('username'));
				$this->session->set_flashdata('pass', $this->input->post('password'));
				$this->session->set_flashdata('msg', 'Password tidak sesuai');
				redirect('/login/');
			}

		}
	}

	// Logout from admin page
	public function logout() {

		// Removing session data
		$sess_array = array(
		'username' => '',
		'id_login' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->session->set_flashdata('alert', 'primary');
		$this->session->set_flashdata('msg', 'Successfully Logout');
		redirect('/login/');
	}

}
