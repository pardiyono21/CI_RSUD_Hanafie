<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();		
		$this->load->model('multi_db');
		if(isset($this->session->userdata['logged_in'])){
			
		}else{
			redirect('/login/');
		}
 
	}
	public function index()
	{
	// load siswa_model
		// Database 1

		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/nav/footer');
	}
}

