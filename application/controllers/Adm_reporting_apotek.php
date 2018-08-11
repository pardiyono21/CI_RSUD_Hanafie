<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_reporting_apotek extends CI_Controller {

	/**
	 * Index Page for this controller.
	 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();		
		$this->load->model('MOlap_apotek','apotek');
 		if(isset($this->session->userdata['logged_in'])){
			
		}else{
			redirect('/login/');
		}
	}
	public function index()
	{

		$data['apotek']=$this->apotek->apotek()->result();
		$data['all_pasien']=$this->apotek->all_pasien()->all_pasien;


		$datareport=$this->apotek->apotek()->result();
		foreach ($datareport as $key) {
			$namabulan[]=$key->bulan;
			$jml[]=$key->jml;
		}
		//$arrayName = array($namabulan);
		$data['namabulan']= json_encode($namabulan);
		$data['jml']= json_encode($jml);


		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/reporting_apotek',$data);
		$this->load->view('admin/nav/footer');
	}

	
}

