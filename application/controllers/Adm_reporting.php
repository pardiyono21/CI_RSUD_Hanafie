<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_reporting extends CI_Controller {

	/**
	 * Index Page for this controller.
	 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();		
		$this->load->model('Mreporting_rawatinap','mreporting');
 		if(isset($this->session->userdata['logged_in'])){
			
		}else{
			redirect('/login/');
		}
	}
	public function index()
	{
		

		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/reporting');
		$this->load->view('admin/nav/footer');
	}

	public function proses_analisis()
	{	$tabel=$this->input->post('tabel');
		$awal=$this->input->post('awal');
		$akhir=$this->input->post('akhir');
		if ($tabel=='rawat_inap') {
			redirect(base_url('adm_reporting_rawatinap?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($tabel=='rawat_jalan') {
			redirect(base_url('adm_reporting_rawatjalan?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($tabel=='penunjang_medis') {
			redirect(base_url('adm_reporting_penunjangmedis?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($tabel=='apotek') {
			redirect(base_url('adm_reporting_apotek?awal='.$awal.'&akhir='.$akhir.''));
		}else{
			redirect(base_url('adm_reporting'));
		}
	}

	
}

