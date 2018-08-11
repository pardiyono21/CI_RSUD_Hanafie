<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_proses_etl extends CI_Controller {

	/**
	 * Index Page for this controller.
	 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();		
		$this->load->model('mproses_etl');
 		if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']['hak_akses']=='admin'){
			
		}else{
			redirect('/login/');
		}
	}
	public function index($tabel=null)
	{
		$tabel = $this->input->get('tabel');
		$data['data_db'] = $this->mproses_etl->field_db($tabel);
		$data['data_dw'] = $this->mproses_etl->field_dw($tabel);
		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/proses_etl',$data);
		$this->load->view('admin/nav/footer');
	}

	public function load_data()
	{
		//$ekstrak_pasien = $this->mproses_etl->ekstrak_pasien();
		if ($this->input->post()) {
			$this->load->view('admin/nav/head.php');
			$this->load->view('admin/proses_etl_load');
			$this->load->view('admin/nav/footer');
		}else{
			redirect(base_url('Adm_proses_etl'));
		}
	}
	public function ekstrak()
	{
		ini_set('max_execution_time', 0); 
		ini_set('memory_limit','2048M');
		$ekstrak_data_pasien = $this->mproses_etl->ekstrak_data_pasien();
		if ($ekstrak_data_pasien==true) {
			$alert_pasien='<i class="fa fa-check"></i> Ekstrak Pasien Berhasil<br>';
		}else{
			$alert_pasien='<i class="fa fa-times"></i> Ekstrak Pasien Gagal data sudah ada<br>';
			
		}

		$ekstrak_data_dokter = $this->mproses_etl->ekstrak_data_dokter();
		if ($ekstrak_data_dokter==true) {
			$alert_dokter='<i class="fa fa-check"></i> Ekstrak Dokter Berhasil<br>';
		}else{
			$alert_dokter='<i class="fa fa-times"></i> Ekstrak Dokter Gagal data sudah ada<br>';
			
		}

		$ekstrak_data_kamar = $this->mproses_etl->ekstrak_data_kamar();
		if ($ekstrak_data_kamar==true) {
			$alert_kamar='<i class="fa fa-check"></i> Ekstrak Kamar Berhasil<br>';
		}else{
			$alert_kamar='<i class="fa fa-times"></i> Ekstrak Kamar Gagal data sudah ada<br>';
			
		}

		$ekstrak_data_penyakit = $this->mproses_etl->ekstrak_data_penyakit();
		if ($ekstrak_data_penyakit==true) {
			$alert_penyakit='<i class="fa fa-check"></i> Ekstrak Penyakit Berhasil<br>';
		}else{
			$alert_penyakit='<i class="fa fa-times"></i> Ekstrak Penyakit Gagal data sudah ada<br>';
			
		}

		$ekstrak_data_asuransi = $this->mproses_etl->ekstrak_data_asuransi();
		if ($ekstrak_data_asuransi==true) {
			$alert_asuransi='<i class="fa fa-check"></i> Ekstrak Asuransi Berhasil<br>';
		}else{
			$alert_asuransi='<i class="fa fa-times"></i> Ekstrak Asuransi Gagal data sudah ada<br>';
			
		}

		$ekstrak_data_klinik = $this->mproses_etl->ekstrak_data_klinik();
		if ($ekstrak_data_klinik==true) {
			$alert_klinik='<i class="fa fa-check"></i> Ekstrak Klinik Berhasil<br>';
		}else{
			$alert_klinik='<i class="fa fa-times"></i> Ekstrak Klinik Gagal data sudah ada<br>';
			
		}
		$ekstrak_data_medis = $this->mproses_etl->ekstrak_data_medis();
		if ($ekstrak_data_medis==true) {
			$alert_medis='<i class="fa fa-check"></i> Ekstrak Penunjang Medis Berhasil<br>';
		}else{
			$alert_medis='<i class="fa fa-times"></i> Ekstrak Penunjang Medis Gagal data sudah ada<br>';
			
		}

		$ekstrak_data_apotek = $this->mproses_etl->ekstrak_data_apotek();
		if ($ekstrak_data_apotek==true) {
			$alert_apotek='<i class="fa fa-check"></i> Ekstrak Apotek Berhasil<br>';
		}else{
			$alert_apotek='<i class="fa fa-times"></i> Ekstrak Apotek Gagal data sudah ada<br>';
		}

		$ekstrak_data_rawatinap = $this->mproses_etl->ekstrak_data_rawatinap();
		if ($ekstrak_data_rawatinap==true) {
			$alert_rawatinap='<i class="fa fa-check"></i> Ekstrak Data Rawat Inap Berhasil<br>';
		}else{
			$alert_rawatinap='<i class="fa fa-times"></i> Ekstrak Data Rawat Inap Gagal data sudah ada<br>';
		}

		$ekstrak_data_rawatjalan = $this->mproses_etl->ekstrak_data_rawatjalan();
		if ($ekstrak_data_rawatjalan==true) {
			$alert_rawatjalan='<i class="fa fa-check"></i> Ekstrak Data Rawat Jalan Berhasil<br>';
		}else{
			$alert_rawatjalan='<i class="fa fa-times"></i> Ekstrak Data Rawat Jalan Gagal data sudah ada<br>';
		}

		$ekstrak_data_penunjangmedis = $this->mproses_etl->ekstrak_data_penunjangmedis();
		if ($ekstrak_data_penunjangmedis==true) {
			$alert_penunjangmedis='<i class="fa fa-check"></i> Ekstrak Data Penunjang Medis Berhasil<br>';
		}else{
			$alert_penunjangmedis='<i class="fa fa-times"></i> Ekstrak Data Penunjang Medis Gagal data sudah ada<br>';
		}
		

		$alert="<script>toastr['info']('$alert_pasien $alert_dokter $alert_kamar $alert_penyakit $alert_asuransi $alert_klinik $alert_apotek $alert_rawatinap $alert_rawatjalan $alert_medis')</script>";
		$this->session->set_flashdata('alert', $alert);
		redirect(base_url('Adm_proses_etl'));
		
	}

}
