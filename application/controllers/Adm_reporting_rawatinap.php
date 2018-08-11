<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_reporting_rawatinap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();		
		$this->load->model('Mreporting_rawatinap','rawatinap');
 		if(isset($this->session->userdata['logged_in'])){
			
		}else{
			redirect('/login/');
		}
	}
	public function index()
	{

		
		


		if ($this->rawatinap->report_pasien()==FALSE) {
			echo "<script>toastr['info']('Selamat datang di website RSUD H. Habibie')</script>";
			redirect(base_url('adm_reporting'));
		}else{
			$data['report_pasien']=$this->rawatinap->report_pasien()->result();


			$datareport=$this->rawatinap->report_pasien()->result();
			foreach ($datareport as $key) {
				$namabulan[]=$key->tgl_masuk;
				$jml[]=$key->jml;
			}
			//$arrayName = array($namabulan);
			$data['namabulan']= json_encode($namabulan);
			$data['jml']= json_encode($jml);
			$this->load->view('admin/nav/head.php');
			$this->load->view('admin/reporting_rawat_inap',$data);
			$this->load->view('admin/nav/footer');
		}
	}

	
}

